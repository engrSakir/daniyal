<?php

namespace App\Http\Livewire\Widgets;

use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use Livewire\Component;

class Pos extends Component
{
    public function render()
    {
        return view('livewire.widgets.pos',[
            'items' => Item::withCount('category_wise_items')->get(),
            'category_wise_items' => CategoryWiseItem::with(['category'])->get(),
            'sub_categories' => SubCategory::all()
        ]);
    }
}
