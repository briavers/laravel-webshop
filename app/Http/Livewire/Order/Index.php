<?php

namespace App\Http\Livewire\Order;

use App\Actions\CreateInvoice;
use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Auth;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Index extends Component
{
    public Collection $orders;

    public function mount(OrderRepositoryInterface $orderRepository)
    {
        $this->orders = $orderRepository->getOrdersForUser(Auth::id());
    }

    public function render()
    {
        return view('livewire.order.index');
    }

    public function downloadInvoice(Order $order) {
        $fileName = 'invoice_' . $order->number . '.pdf';
        $action = new CreateInvoice();
        $invoice = $action->execute($order);
        $invoice->save(storage_path('invoices/' . $fileName), true);

        return response()->download(storage_path('invoices/' . $fileName));
    }
}
