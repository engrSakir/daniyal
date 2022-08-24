<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Cart extends Component
{

    protected $listeners = ['cart_refresh' => 'render'];

    public function render()
    {
        return view('livewire.frontend.cart',[
            'items' => \ShopCart::getContent()->sort()
        ])
        ->extends('layouts.frontend.app', ['title' => 'Details'])
        ->section('content');
    }
}
