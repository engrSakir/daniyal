<?php

namespace App\Http\Livewire\Manager;

use App\Models\Category;
use App\Models\PlatterMenu;
use App\Models\SetMenu;
use Livewire\Component;

class Menu extends Component
{
    public function render()
    {
        return view('livewire.manager.menu',[
            'categories' => Category::all(),
            'set_menus' => SetMenu::all(),
            'platter_menus' => PlatterMenu::all(),
        ]);
    }
}
