<?php

namespace App\Http\Livewire\Manager;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\SubCategory;
use Livewire\Component;

class Menu extends Component
{
    public function render()
    {
        return view('livewire.manager.menu',[
            'categories' => Category::all(),
            // 'category_wise_items' => CategoryWiseItem::where('category_id', $this->category->id)->get()->unique('item_id'),
            // 'sub_categories' => SubCategory::where('category_id', $this->category->id)->get(),
        ]);
    }
}
