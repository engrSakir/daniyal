<?php

namespace App\Http\Livewire\Frontend;

use App\Models\CategoryWiseItem;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Cart extends Component
{
    use LivewireAlert;


    protected $listeners = ['cart_refresh' => 'render'];

    public function render()
    {
        return view('livewire.frontend.cart', [
            'items' => \ShopCart::getContent()->sort(),
            'total' => \ShopCart::getTotal(),
        ])
            ->extends('layouts.frontend.app', ['title' => 'Details'])
            ->section('content');
    }

    public $full_name, $phone_number, $full_address, $special_note;
    public function order_submit()
    {
        $this->validate([
            'full_name' => 'required|string|min:3|max:30',
            'phone_number' => 'required|string|min:11|max:11',
            'full_address' => 'required|string|max:200',
            'special_note' => 'nullable|string|max:5000',
        ]);

        if (\ShopCart::isEmpty()) {
            $this->alert('error', 'Item not fount');
        } else {
            try {
                $total_order_count_of_this_month = Order::select('id')->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->count();
                $order = new Order();
                $order->serial_number = date('ym') . sprintf("%'.05d", $total_order_count_of_this_month + 1); //220700001
                $order->status = 'Pending'; //Pending, Reject, Cook, Serve, Complete
                $order->is_online = true;
                $order->is_parcel = true;
                $order->customer_name =  $this->full_name;
                $order->customer_phone =  $this->phone_number;
                $order->customer_address = $this->full_address;
                $order->payable_amount = round(\ShopCart::getTotal(), 0);
                $order->paid_amount = 0;
                $order->delivery_fee =  get_static_option('online_delivery_charge');
                $order->discount_percentage = 0;
                $order->discount_fixed_amount = 0;
                $order->save();

                //Items
                foreach (\ShopCart::getContent()->sort() as $item) {
                    $category_wise_item = CategoryWiseItem::find($item->id);
                    $order_item = new OrderItem();
                    $order_item->order_id = $order->id;
                    $order_item->category_wise_item_id = $category_wise_item->id;
                    $order_item->original_price = $category_wise_item->price;
                    $order_item->offer_id = $item->offer_id;
                    $order_item->selling_price = $item->offer_id ? $item->price : $category_wise_item->price;
                    $order_item->quantity = $item->quantity;
                    $order_item->save();
                }
                $this->emit('clearCart');
                $this->full_name = $this->phone_number = $this->full_address = $this->special_note = null;            
                $this->alert('success', 'Successfully order submited');
            } catch (\Exception $e) {
                $this->alert('error', $e->getMessage());
            }
        }
    }
}
