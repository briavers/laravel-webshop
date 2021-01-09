<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class ListItem extends Component
{
    private Category $category;

    public function mount($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.category.list-item', ['category' => $this->category]);
    }
}
