<?php

namespace App\Http\Livewire\Manager;

use App\Models\Category;
use Livewire\Component;

class Dashoard extends Component
{
    public function render()
    {
        return view('livewire.manager.dashoard',[
            'item_categories' => Category::where('type', 'Item')->get(),
            'set_menu_categories' => Category::where('type', 'Set Menu')->get(),
        ]);
    }
}
