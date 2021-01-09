<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use Livewire\Component;

class Complete extends Component
{
    public Order $order;

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.order.complete');
    }


    public function checkPayment()
    {
        $this->order->refresh();
    }
}
