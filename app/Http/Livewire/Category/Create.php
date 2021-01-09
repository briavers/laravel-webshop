<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Cache;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Response;

class Create extends Component
{
    protected CategoryRepositoryInterface $categoryRepository;
    protected array $rules;

    public Category $category;
    public ?Category $parentCategory;
    public ?Category $focusedCategory;
    public ?string $name_nl = null;
    public ?string $name_fr = null;
    public ?string $name_en = null;
    public ?string $desc_nl = null;
    public ?string $desc_fr = null;
    public ?string $desc_en = null;
    public ?int $menu = null;

    public function __construct($id = null)
    {
        $this->categoryRepository = resolve(CategoryRepository::class);
        $this->rules = Category::getLivewireCreateRules();
        parent::__construct($id);
    }
    public function mount()
    {
        $this->category = $this->focusedCategory ?? new Category();
        $this->name_nl = $this->category->getTranslation('name', 'nl');
        $this->name_fr = $this->category->getTranslation('name', 'fr');
        $this->name_en = $this->category->getTranslation('name', 'en');
        $this->desc_nl = $this->category->getTranslation('description', 'nl');
        $this->desc_fr = $this->category->getTranslation('description', 'fr');
        $this->desc_en = $this->category->getTranslation('description', 'en');
    }

    public function save()
    {
        $this->validate($this->rules);
        $category = $this->category;
        $category->name = [
            'nl' => $this->name_nl,
            'fr' => $this->name_fr,
            'en' => $this->name_en,
        ];
        $category->description = [
            'nl' => $this->desc_nl,
            'fr' => $this->desc_fr,
            'en' => $this->desc_en,
        ];

        if (!$category->id){
            $category->parent_id = $this->parentCategory->getKey() ?? null;
        }

        $category->save();
        Cache::forget('category-menu-items');

        return redirect(route('admin.categories.index'));
    }


    public function render()
    {
        return view('livewire.category.create');
    }
}
