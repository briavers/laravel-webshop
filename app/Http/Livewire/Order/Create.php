<?php

namespace App\Http\Livewire\Order;

use App\Models\Address;
use App\Models\Enums\CartConditionEnum;
use App\Models\Enums\OrderStatusEnum;
use App\Models\Order;
use App\Models\OrderLine;
use App\Models\Product;
use App\Repositories\Interfaces\AddressRepositoryInterface;
use App\Repositories\Interfaces\OrderLineRepositoryInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Auth;
use Cart;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Mollie;
use Mollie\Api\Resources\Payment;
use Symfony\Component\HttpFoundation\Response;

class Create extends Component
{
    public Address $address;
    public bool $terms = false;
    public bool $present = false;
    private AddressRepositoryInterface $addressRepository;
    private OrderRepositoryInterface $orderRepository;
    private OrderlineRepositoryInterface $orderLineRepository;
    private ProductRepositoryInterface $productRepository;
    protected $rules = [];

    public function __construct()
    {
        $this->address = new Address();
        $this->rules = Address::getLivewireCreateRules();
        $this->rules['terms'] = ['required', 'accepted'];
        $this->rules['present'] = ['present'];
        $this->addressRepository = resolve(AddressRepositoryInterface::class);
        $this->orderRepository = resolve(OrderRepositoryInterface::class);
        $this->orderLineRepository = resolve(OrderLineRepositoryInterface::class);
        $this->productRepository = resolve(ProductRepositoryInterface::class);
    }

    public function mount()
    {
        $user = Auth::user();
        if ($user){
           $this->address->first_name = $user->first_name;
           $this->address->last_name = $user->last_name;
           /*
           if ($user->orders()){
               $order = $user->orders()->orderByDesc('id')->with('address')->first();
               $address = $order->address;
               $this->address = clone $address;
           }
           */
        }
    }

    public function render()
    {
        if (Cart::isEmpty()) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return view('livewire.order.create');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function checkout()
    {
        $this->validate();

        if (empty($this->address->email)) {
            $this->address->email = Auth::user()->email;
        }

        if (Auth::id()){
            $this->address->user_id = Auth::id();
        }

        $address = $this->addressRepository->createAddress($this->address);

        $order = $this->makeOrder();
        $order->address_id = $address->id;
        $order = $this->orderRepository->createOrder($order);

        foreach (Cart::getContent() as $cartItem) {
            $this->orderLineRepository->createOrderLine($this->makeOrderLine($order, $cartItem));

            if ($cartItem->model->stock < $cartItem->quantity){
                Cart::remove($cartItem->id);
                $order->forceDelete();
                $address->forceDelete();

                request()->session()->flash('order-too-late', __('models.order.too_late'));
                return redirect(route('cart.index'));
            }

            $cartItem->model->decrement('stock', $cartItem->quantity);
            $cartItem->model->parent->decrement('stock', $cartItem->quantity);

        }
        if (Cart::getCondition(CartConditionEnum::SHIPPING)) {
            $this->orderLineRepository->createOrderLine($this->makeShippingOrderLine($order));
        }

        Cart::clear();
        $order->refresh();
        /** @var Payment $payment */
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => (string)$order->total_inclusive
            ],
            "description" => $order->description,
            "redirectUrl" => route('order.complete', $order->id),
            "webhookUrl" => route('webhooks.mollie'),
            "metadata" => [
                "order_id" => $order->id,
            ],
        ]);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), Response::HTTP_SEE_OTHER);
    }

    private function makeOrder(): Order
    {
        $inclusive = round(Cart::getTotal(), 2);
        $exclusive = round((Cart::getTotal() / 1.21), 2);
        $vat = $inclusive - $exclusive;

        $order = new Order();
        $order->user_id = Auth::id();
        $order->status = OrderStatusEnum::CREATED;
        $order->total_inclusive = $inclusive;
        $order->total_exclusive = $exclusive;
        $order->total_vat = $vat;
        $order->present = $this->present;

        return $order;
    }

    private function makeOrderLine(Order $order, $cartItem): OrderLine
    {
        /** @var Product $product */
        $product = $cartItem->model;

        $orderLine = new OrderLine();
        $orderLine->order_id = $order->id;
        $orderLine->product_id = $product->id;
        $orderLine->name = $cartItem->name;
        $orderLine->unit_price = $product->unit_price;
        $orderLine->quantity = $cartItem->quantity;
        $orderLine->size = $product->size;
        $orderLine->color = $product->color;
        $orderLine->discount = $product->discount;

        return $orderLine;
    }

    private function makeShippingOrderLine(Order $order): OrderLine
    {
        $orderLine = new OrderLine();
        $orderLine->order_id = $order->id;
        $orderLine->name = 'Shipping';
        $orderLine->unit_price = config('extra_costs.shipping-fee');
        $orderLine->quantity = 1;

        return $orderLine;
    }
}
