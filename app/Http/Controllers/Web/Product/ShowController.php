<?php

namespace App\Http\Controllers\Web\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Request $request, Product $product)
    {
        $this->authorize('view', $product);

        if ($product->parent_id){
            return redirect(route('product.show', $product->parent_id));
        }

        return view('models.product.show', ['product' => $product]);
    }
}
