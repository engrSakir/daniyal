<?php

namespace App\Http\Livewire\Manager;

use App\Models\Category;
use Livewire\Component;

class Menu extends Component
{
    public function render()
    {
        return view('livewire.manager.menu',[
            'categories' => Category::all(),
        ]);
    }
}
