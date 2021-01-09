<?php

namespace App\Http\Livewire\Component;

use App\Http\Livewire\Product\Create;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Collection;
use Livewire\Component;

class CategorySelect extends Component
{
    public Collection $categories;
    public array $selectedCategories = [];

    public function mount(Collection $presentCategories, CategoryRepository $categoryRepository)
    {
        foreach ($presentCategories as $category) {
            $this->selectedCategories[$category->id] = $category->name;
        }

        $this->categories = $categoryRepository->selectAll();
    }

    public function render()
    {
        return view('livewire.component.category-select');
    }
    public function updatedSelectedCategories ($value)
    {
        $this->emitUp('SelectedCategoriesUpdated', $value);
    }
}
