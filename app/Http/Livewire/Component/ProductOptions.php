<?php

namespace App\Http\Livewire\Component;

use App;
use App\Models\Enums\RoleEnum;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductOptions extends Component
{
    public Collection $sizes;
    public Product $parent;
    public ?string $active;
    public Collection $items;

    protected ProductRepositoryInterface $productRepository;
    protected $listeners = ['sizeSelected' => 'sizeSelected'];

    public function __construct($id = null)
    {
        $this->productRepository = resolve(ProductRepository::class);

        parent::__construct($id);
    }

    public function mount()
    {
        if (empty($this->active)) {
            $this->active = $this->sizes->first();
            $this->updateColorsVariable();

        }
    }

    public function render()
    {
        return view('livewire.component.product-options');
    }

    public function sizeSelected($size)
    {
        $this->active = $size;
        $this->updateColorsVariable();
    }

    public function colorSelected($itemUuid)
    {
        $this->emitUp('updateSelectedItem', $itemUuid);
    }

    private function updateColorsVariable(): void
    {
        $query = $this->productRepository->selectByParent($this->parent->id)
            ->where('size->' . App::getLocale() , $this->active);

        if(! (Auth::user() && RoleEnum::isInternal(Auth::user()->role_uuid))){
            $query->where('stock', '>', 0);
        }

        $this->items = $query
            ->get()
            ->unique('color');

        if ($this->items->first()) {
            $this->emitUp('updateSelectedItem', $this->items->first()->uuid);
        }
    }
}
