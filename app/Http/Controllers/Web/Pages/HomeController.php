<?php

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Foundation\Inspiring;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function __invoke(Request $request)
    {
        return view('pages.home', [
            'qoute' => Inspiring::quote(),
            'promotedProducts' => $this->productRepository->getPromoted(5),
            'newItems' => $this->productRepository->getNewest(5),
        ]);
    }
}
