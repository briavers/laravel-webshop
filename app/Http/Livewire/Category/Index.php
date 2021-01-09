<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Collection;
use Livewire\Component;

class Index extends Component
{
    protected CategoryRepositoryInterface $categoryRepository;

    private Collection $categories;
    public bool $isOpen = false;
    public ?Category $focusedCategory = null;
    public ?Category $parentCategory = null;
    protected $listeners = [
        'closeModal' => 'closeModal',
        'createCategory' => 'create',
        'editCategory' => 'edit',
        'deleteCategory' => 'delete'
    ];

    public function __construct($id = null)
    {
        $this->categoryRepository = resolve(CategoryRepository::class);
        $this->categories = Category::get()->toTree();

        parent::__construct($id);
    }

    public function render()
    {
        return view('livewire.category.index', ['categories' => $this->categories]);
    }

    public function create(?Category $parentCategory)
    {
        $this->parentCategory = $parentCategory;
        $this->openModal();
    }

    public function edit(?Category $focusedCategory)
    {
        $this->focusedCategory = $focusedCategory;
        $this->openModal();
    }

    public function delete(Category $category)
    {
        $category->delete();
        $this->categories = Category::get()->toTree();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->focusedCategory = null;
        $this->isOpen = false;
    }
}
