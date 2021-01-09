<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class IndexCard extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.product.index-card');
    }
}
