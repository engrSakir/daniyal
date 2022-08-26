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
        $this->emit('cart_refresh');

        return view('livewire.widgets.cart',[
            'items' => \ShopCart::getContent()->sort(),
            'total' => \ShopCart::getTotal(),
        ]);
    }

    protected $listeners = ['addToCard', 'updateQuantity', 'clearCart'];

    public function addToCard(CategoryWiseItem $category_wise_item)
    {
        \ShopCart::add([
            'id' => $category_wise_item->id,
            'name' => $category_wise_item->item->name ?? 'N/A',
            'price' => $category_wise_item->price,
            'quantity' => 1,
            'image' => $category_wise_item->item->image ?? null
        ]);
        $this->alert('success', 'Add', [
            'position' => 'bottom-start'
        ]);
    }

    public function updateQuantity($id, $type){
        if($type == '+'){
            $qty = 1;
        }else{
            $qty = -1;
        }
        if (\ShopCart::get($id)) {
            \ShopCart::update($id, [
                'quantity' => $qty,
            ]);
        }else{
            $this->addToCard(CategoryWiseItem::find($id));
        }
    }

    public function remove_item($id){
        \ShopCart::remove($id);
        $this->alert('success', 'Remove', [
            'position' => 'bottom-start'
        ]);
    }

    public function clearCart(){
        \ShopCart::clear();
        sleep(2);
        $this->alert('success', 'Cart Clear', [
            'position' => 'bottom-start'
        ]);
    }
}
