<?php

namespace App\Http\Livewire\Frontend;

use App\Models\CategoryWiseItem;
use Livewire\Component;

class Details extends Component
{
    public CategoryWiseItem $category_wise_item;
    public function mount(CategoryWiseItem $category_wise_item){
        $this->category_wise_item = $category_wise_item;
    }

    protected $listeners = ['cart_refresh' => 'render'];

    public function render()
    {
        return view('livewire.frontend.details',[
            'quantity' => \ShopCart::get($this->category_wise_item->id)->quantity ?? 0
        ])
        ->extends('layouts.frontend.app', ['title' => 'Details'])
        ->section('content');
    }
}
