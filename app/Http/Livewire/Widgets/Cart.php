<?php

namespace App\Http\Livewire\Widgets;

use App\Models\CategoryWiseItem;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Cart extends Component
{
    use LivewireAlert;

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
            'quantity' => 1,
            'image' => $category_wise_item->item->image ?? null
        ]);
        $this->alert('success', 'Add');
        // $this->category_wise_item = $category_wise_item;
        // $this->dispatchBrowserEvent('addToCardJsFunction');
    }

    public function remove_item($id){
        \ShopCart::remove($id);
        $this->alert('success', 'Remove');
    }
}
