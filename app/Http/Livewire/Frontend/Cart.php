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

    public $full_name, $phone_number, $full_address, $special_note;
    public function order_submit(){
        $this->validate([
            'full_name' => 'required|string|min:3|max:30',
            'phone_number' => 'required|string|min:11|max:11',
            'full_address' => 'required|string|max:200',
            'special_note' => 'nullable|string|max:5000',
        ]);
    }
}
