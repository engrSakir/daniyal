<?php

namespace App\Http\Livewire\Manager;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use Livewire\Component;

class Order extends Component
{
    public $category, $category_id;

    public function render()
    {
        if($this->category_id){
            $this->category = Category::find($this->category_id) ?? null;
        }
        return view('livewire.manager.order',[
            'caregories' => Category::all(),
            'category_wise_items' => CategoryWiseItem::where('category_id', $this->category_id)->get()
        ]);
    }
}
