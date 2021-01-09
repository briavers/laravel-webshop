<?php

namespace App\Http\Livewire\Cart;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use Cart;
use Livewire\Component;

class Index extends Component
{
    protected ProductRepositoryInterface $productRepository;

    public function __construct($id = null)
    {
        $this->productRepository = resolve(ProductRepository::class);

        parent::__construct($id);
    }

    public function render()
    {
        $products = Cart::getContent()->sortBy('id');

        return view(
            'livewire.cart.index',
            [
                'products' => $products,
            ]
        );
    }

    public function removeOne($id)
    {
        //TODO: add undo button
        Cart::update($id, array(
            'quantity' => -1,
        ));
        $this->emit('cartUpdated');
    }

    public function removeAll($id)
    {
        //TODO: add undo button
        Cart::remove($id);
        $this->emit('cartUpdated');
    }
}
