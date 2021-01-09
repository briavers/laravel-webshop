<?php

namespace App\Http\Controllers\Web\Product;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request, ?string $slug = null)
    {
        $this->authorize('viewAny', Product::class);

        return view('models.product.index', ['slug' => $slug]);
    }
}
