<?php

namespace App\Observers;

use App\Models\Product;
use Ramsey\Uuid\Uuid;

class ProductObserver
{
    public function creating(Product $product)
    {
        $product->uuid = Uuid::uuid4();
        $product->discount = $product->discount ?? 0;
        $product->promoted = $product->promoted ?? false;
    }

    public function created(Product $product)
    {
        //
    }

    public function updated(Product $product)
    {
        //
    }

    public function deleted(Product $product)
    {
        //
    }

    public function restored(Product $product)
    {
        //
    }

    public function forceDeleted(Product $product)
    {
        //
    }
}
