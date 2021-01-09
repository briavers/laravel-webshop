<?php

namespace App\Http\View\Composers;

use Cart;
use Illuminate\View\View;

class CartComposer
{
    public function compose(View $view): void
    {
        $contents = Cart::getContent();
        $view->with('cart', $contents);
    }
}
