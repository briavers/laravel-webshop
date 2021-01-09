<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use DB;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class Create extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    protected array $rules;
    protected $listeners = ['SelectedCategoriesUpdated' => 'updatedSelectedCategories'];


    // TODO: add validation
    public $photos = [];
    public ?string $name_nl = null;
    public ?string $name_fr = null;
    public ?string $name_en = null;
    public ?string $desc_nl = null;
    public ?string $desc_fr = null;
    public ?string $desc_en = null;
    public ?bool $promoted = false;
    public $products = [];
    public array $selectedCategories = [];

    public function __construct($id = null)
    {
        $this->rules = Product::getLivewireCreateRules();
        parent::__construct($id);
    }

    public function mount()
    {
        $this->products[] = new Product();
    }

    public function save()
    {
        $this->validate($this->rules);

        DB::beginTransaction();

        try {
            $totalStock = 0;

            $product = new Product();
            $product->name = [
                'nl' => $this->name_nl,
                'fr' => $this->name_fr,
                'en' => $this->name_en,
            ];
            $product->description = [
                'nl' => $this->desc_nl,
                'fr' => $this->desc_fr,
                'en' => $this->desc_en,
            ];
            $product->save();
            $product->syncCategories($this->selectedCategories);

            foreach ($this->products as $item) {
                $childProduct = new Product();
                $childProduct->parent_id = $product->id;
                $childProduct->stock = Arr::get($item, 'stock');
                $childProduct->size = [
                    'nl' => Arr::get($item, 'size.nl'),
                    'fr' => Arr::get($item, 'size.fr'),
                    'en' => Arr::get($item, 'size.en'),
                ];
                $childProduct->color = [
                    'nl' => Arr::get($item, 'color.nl'),
                    'fr' => Arr::get($item, 'color.fr'),
                    'en' => Arr::get($item, 'color.en'),
                ];
                $childProduct->color_code = Arr::get($item, 'color_code');
                $childProduct->unit_price = Arr::get($item, 'unit_price');
                $childProduct->cost = Arr::get($item, 'cost');
                //$childProduct->discount = Arr::get($item, 'discount');

                $childProduct->save();

                $totalStock += Arr::get($item, 'stock');
            }

            $product->stock = $totalStock;
            $product->save();

            $this->flash('success', 'Product saved', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'text' => '',
                'confirmButtonText' => '',
                'cancelButtonText' => '',
                'showCancelButton' => false,
                'showConfirmButton' => false,
            ]);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        if ($product->id) {
            $this->saveImages($product);
        }

        return redirect()->route('product.index');
    }

    public function addItem()
    {
        $this->products[] = new Product();
    }

    public function removeItem(int $index)
    {
        Arr::forget($this->products, $index);
    }

    public function render()
    {
        $this->authorize('create', Product::class);

        return view('livewire.product.create');
    }

    private function saveImages(Product $product)
    {
        foreach ($this->photos as $photo) {
            $product->addMediaFromString($photo->get())
                ->withResponsiveImages()
                ->toMediaCollection();
        }
    }

    public function finishUpload($name, $tmpPath, $isMultiple)
    {
        $this->cleanupOldUploads();

        $files = collect($tmpPath)->map(function ($i) {
            return TemporaryUploadedFile::createFromLivewire($i);
        })->toArray();
        $this->emitSelf('upload:finished', $name, collect($files)->map->getFilename()->toArray());

        $files = array_merge($this->getPropertyValue($name), $files);
        $this->syncInput($name, $files);
    }

    public function updatedSelectedCategories($selectedCategories) {
        $this->selectedCategories = $selectedCategories;
    }
}
