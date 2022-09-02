<?php

namespace App\Http\Livewire\Widgets;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Order as ModelsOrder;
use App\Models\Waiter;
use Carbon\Carbon;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Order extends Component
{
    use LivewireAlert, WithFileUploads;

    public $category;
    public $waiter, $phone, $name, $address, $discount_percentage, $discount_fixed_amount, $delivery_charge;

    protected $listeners = ['updateOrder' => 'render'];

    public function mount(){
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.widgets.order',[
            'category_wise_items' => CategoryWiseItem::where(function($query){
                if($this->category){
                    $query->where('category_id', $this->category);
                }
            })->get(),
            'orders' => ModelsOrder::whereDate('created_at', Carbon::today())->latest()->get(),
            'items' => \ShopCart::getContent()->sort(),
            'total' => \ShopCart::getTotal(),
            'waiters' => Waiter::all()
        ]);
    }

    public function change_status(ModelsOrder $order, $status)
    {
        if($order->status != 'Complete')
        $order->update(['status' => $status]);
        $this->alert('success', 'Status Update', [
            'position' => 'bottom-start'
        ]);
    }

    public function delete(ModelsOrder $order)
    {
        $order->delete();
        $this->alert('success', 'Successfully deleted', [
            'position' => 'bottom-start'
        ]);
    }


    //update ---------------
    
    public ModelsOrder $selected_online_order;
    public function select_online_order(ModelsOrder $order){
        \ShopCart::clear();

        $this->phone = $order->customer_phone;
        $this->name = $order->customer_name;
        $this->address = $order->customer_address;
        $this->discount_percentage = $order->discount_percentage;
        $this->discount_fixed_amount = $order->discount_fixed_amount;
        $this->delivery_charge = $order->delivery_fee;
        foreach($order->order_items as $order_item){
            \ShopCart::add([
                'id' => $order_item->category_wise_item->id,
                'name' => $order_item->category_wise_item->item->name ?? 'N/A',
                'sub_category_name' => $order_item->category_wise_item->sub_category_name() ?? 'N/A',
                'price' => $order_item->selling_price,
                'quantity' => $order_item->quantity,
                'image' => $order_item->category_wise_item->item->image ?? null
            ]);
        }
        $this->selected_online_order = $order;
    }

    public function addToCard(CategoryWiseItem $category_wise_item)
    {
        \ShopCart::add([
            'id' => $category_wise_item->id,
            'name' => $category_wise_item->item->name ?? 'N/A',
            'sub_category_name' => $category_wise_item->sub_category_name() ?? 'N/A',
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
