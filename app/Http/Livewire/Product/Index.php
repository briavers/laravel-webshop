<?php

namespace App\Http\Livewire\Product;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use Livewire\Component;

class Index extends Component
{
    protected ProductRepositoryInterface $productRepository;
    public ?string $slug;
    public function mount(?string $slug = null, ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function render()
    {
        if ($this->slug) {
            $products = $this->productRepository->selectBySlug($this->slug);
        } else {
            $products = $this->productRepository->selectParentPaginated();
        }


        return view(
            'livewire.product.index',
            [
                'products' => $products,
            ]
        );
    }
}
