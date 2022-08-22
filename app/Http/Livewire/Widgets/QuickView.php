<?php

namespace App\Http\Livewire\Widgets;

use App\Models\Product;
use Livewire\Component;

class QuickView extends Component
{
    public $product;

    protected $listeners = ['product'];

    public function product($product_id){
        $this->product = Product::findOrFail($product_id);
    }

    public function render()
    {
        return view('livewire.widgets.quick-view');
    }
}
