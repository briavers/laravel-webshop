<?php

namespace App\Http\Livewire\Product;

use App\Models\Livewire\CustomTemporaryUploadedFile;
use App\Models\Media;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use DB;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\MediaCollection;

class Edit extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    protected array $rules;
    protected $listeners = ['SelectedCategoriesUpdated' => 'updatedSelectedCategories', 'deleteOld' => 'deleteOld'];

    private ProductRepositoryInterface $productRepository;

    // TODO: add validation
    public $update;
    public $photos = [];
    public $oldPhotos = [];
    public $products = [];
    public array $selectedCategories = [];

    public ?Product $product;

    public ?string $name_nl = null;
    public ?string $name_fr = null;
    public ?string $name_en = null;
    public ?string $desc_nl = null;
    public ?string $desc_fr = null;
    public ?string $desc_en = null;
    public ?bool $promoted = false;

    public function __construct($id = null)
    {
        $this->rules = Product::getLivewireCreateRules();
        $this->productRepository = resolve(ProductRepository::class);
        parent::__construct($id);
    }

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->name_nl = $product->getTranslation('name', 'nl');
        $this->name_fr = $product->getTranslation('name', 'fr');
        $this->name_en = $product->getTranslation('name', 'en');
        $this->desc_nl = $product->getTranslation('description', 'nl');
        $this->desc_fr = $product->getTranslation('description', 'fr');
        $this->desc_en = $product->getTranslation('description', 'en');

        $this->products = $this->productRepository->selectByParent($product->id)->get()->toArray();


        $this->oldPhotos = $product->getMedia();
    }

    public function save()
    {
        $this->validate($this->rules);

        DB::beginTransaction();

        try {
            $totalStock = 0;

            $this->product->name = [
                'nl' => $this->name_nl,
                'fr' => $this->name_fr,
                'en' => $this->name_en,
            ];
            $this->product->description = [
                'nl' => $this->desc_nl,
                'fr' => $this->desc_fr,
                'en' => $this->desc_en,
            ];
            $this->product->save();
            $this->product->syncCategories($this->selectedCategories);

            foreach ($this->products as $item) {
                $childProduct = Product::whereId(Arr::get($item, 'id'))->firstOrNew();
                $childProduct->parent_id =  $this->product->id;
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

            $this->product->stock = $totalStock;
            $this->product->save();

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

        if ($this->product->id) {
            $this->saveImages($this->product);
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

    public function deleteOld(string $uuid)
    {
        Media::findByUuid($uuid)->delete();
        $this->oldPhotos = [];
        $this->product->refresh();
        $this->oldPhotos = $this->product->getMedia();
    }

    public function updatedSelectedCategories($selectedCategories) {
        $this->selectedCategories = $selectedCategories;
    }
}
