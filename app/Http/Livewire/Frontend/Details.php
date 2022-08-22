<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Product;
use Livewire\Component;

class Details extends Component
{
    public $product;
    public function mount($slug){
        $this->product = Product::where('slug', $slug)->first();
        if(!$this->product){
            return abort(404);
        }
    }

    public function render()
    {
        return view('livewire.frontend.details')
        ->extends('layouts.frontend.app', ['title' => 'Details'])
        ->section('content');
    }
}
