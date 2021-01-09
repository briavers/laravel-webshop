<?php

namespace App\Http\Livewire\Component;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Cart;
use Livewire\Component;

class NavigationMenu extends Component
{
    protected $cart;
    public $menuCategories;
    protected $listeners = ['cartUpdated' => 'cartUpdated'];

    public function mount(CategoryRepositoryInterface $categoryRepository) {
        $this->menuCategories = $categoryRepository->getMenuItems();
    }

    public function cartUpdated()
    {
        $this->cart = Cart::getContent();
    }

    public function render()
    {
        return view('livewire.component.navigation-menu');
    }
}
