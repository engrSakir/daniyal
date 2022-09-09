<?php

namespace App\Http\Livewire\Widgets;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\PaymentMethod;
use App\Models\SubCategory;
use App\Models\Table;
use App\Models\Waiter;
use Livewire\Component;

class Pos extends Component
{
    public function render()
    {
        return view('livewire.widgets.pos',[
            'items' => Item::withCount('category_wise_items')->get(),
            'category_wise_items' => CategoryWiseItem::all(),
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all(),
            'waiters' => Waiter::all(),
            'tables' => Table::all(),
            'payment_methods' => PaymentMethod::where('active_to_outlet', true)->get(),
        ]);
    }
}
