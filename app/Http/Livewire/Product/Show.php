<?php

namespace App\Http\Livewire\Product;

use App\Models\Enums\RoleEnum;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Show extends Component
{
    public Product $product;
    public Product $selectedProduct;
    public ?Media $detailImage;
    public bool $addedToCart = false;
    protected $listeners = ['updateSelectedItem' => 'updateSelectedItem'];

    protected ProductRepositoryInterface $productRepository;

    public function __construct($id = null)
    {
        $this->productRepository = resolve(ProductRepository::class);

        parent::__construct($id);
    }

    public function render()
    {
        $query = $this->productRepository->selectByParent($this->product->id);
        if(! (Auth::user() && RoleEnum::isInternal(Auth::user()->role_uuid))){
            $query->where('stock', '>', 0);
        }

        $sizes = $query->get('size')->unique('size')->pluck('size');
        if (empty($this->detailImage)) {
            $this->detailImage = $this->product->getFirstMedia();
        }

        return view(
            'livewire.product.show',
            [
                'product' => $this->product,
                'sizes' => $sizes
            ]
        );
    }

    public function pictureSelected($mediaUuid)
    {
        $this->detailImage = Media::findByUuid($mediaUuid);
    }

    public function updateSelectedItem($itemUuid)
    {
        $item = Product::whereUuid($itemUuid)->sole();

        $this->selectedProduct = $item;
    }

    public function addToCart()
    {
        Cart::add(
            $this->selectedProduct->id,
            $this->product->name,
            $this->selectedProduct->unit_price,
            1
        )->associate(Product::class);

        $this->emit('cartUpdated');
        $this->addedToCart = true;
    }
}
