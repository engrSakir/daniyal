<?php

namespace App\Http\Livewire\Manager;

use App\Models\Category;
use Livewire\Component;

class Dashoard extends Component
{
    public function render()
    {
        return view('livewire.manager.dashoard',[
            'categories' => Category::all(),
        ]);
    }
}
