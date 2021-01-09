<?php

namespace App\Listeners;

use App\Models\Enums\CartConditionEnum;
use Carbon\Carbon;
use Cart;
use Darryldecode\Cart\CartCondition;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CartUpdatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $this->setShoppingCart();
    }

    private function setShoppingCart()
    {
        if (Cart::getTotal() < config('extra_costs.min-free-shipping')) {
            // add single condition on a cart bases
            $condition = new CartCondition(array(
                'name' => CartConditionEnum::SHIPPING,
                'type' => 'shipping',
                'target' => 'total',
                'value' => '+' . config('extra_costs.shipping-fee'),
            ));

            Cart::condition($condition);
        } else {
            Cart::removeCartCondition(CartConditionEnum::SHIPPING);
        }
    }
}
