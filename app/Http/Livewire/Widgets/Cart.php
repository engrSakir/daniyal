<?php

namespace App\Http\Livewire\Widgets;

use App\Models\CategoryWiseItem;
use Livewire\Component;

class Cart extends Component
{
    public function render()
    {

        return view('livewire.widgets.cart',[
            'items' => \ShopCart::getContent()
        ]);
    }

    protected $listeners = ['addToCard'];

    public function addToCard(CategoryWiseItem $category_wise_item)
    {
        \ShopCart::add([
            'id' => $category_wise_item->id,
            'name' => $category_wise_item->item->name ?? 'N/A',
            'price' => $category_wise_item->price,
            'quantity' => 1
        ]);

        // $this->category_wise_item = $category_wise_item;
        $this->dispatchBrowserEvent('addToCardJsFunction');
        $this->render();
    }
}
