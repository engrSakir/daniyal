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
}
