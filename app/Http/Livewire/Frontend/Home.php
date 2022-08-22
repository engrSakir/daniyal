<?php

namespace App\Http\Livewire\Frontend;

use App\Models\CategoryWiseItem;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.frontend.home',[
            'category_wise_items' => CategoryWiseItem::all()
        ])->extends('layouts.frontend.app', ['title' => 'Home'])
            ->section('content');
    }

    public function select_product_for_quick_view(CategoryWiseItem $categoryWiseItem)
    {
        $this->dispatchBrowserEvent('quick_view_data_event', ['quick_view_data' => $categoryWiseItem]);
    }
}
