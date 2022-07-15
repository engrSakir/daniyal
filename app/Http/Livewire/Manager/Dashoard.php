<?php

namespace App\Http\Livewire\Manager;

use App\Models\Category;
use App\Models\SetMenu;
use App\Models\PlatterMenu;
use Livewire\Component;

class Dashoard extends Component
{
    public function render()
    {
        return view('livewire.manager.dashoard',[
            'categories' => Category::all(),
            'set_menus' => SetMenu::all(),
            'platter_menus' => PlatterMenu::all(),
        ]);
    }
}
