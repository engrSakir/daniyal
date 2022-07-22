<?php

namespace App\Http\Livewire\Manager;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\Order as ModelsOrder;
use App\Models\SubCategory;
use App\Models\Table;
use App\Models\Waiter;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Order extends Component
{
    use LivewireAlert, WithFileUploads;

    public $category, $category_id;
    public $items_array = [];
    public $parcel, $phone, $address, $paid_amount, $waiter, $table;
    public $receive_amount, $total_bill, $return_amount;

    public function render()
    {
        if ($this->category_id) {
            $this->category = Category::find($this->category_id) ?? null;
        }

        $this->total_bill = collect($this->items_array)->sum('item_sub_total_price') ?? 0;
        $this->return_amount = ((int)$this->receive_amount) - $this->total_bill;
        if($this->return_amount < 0){
            $this->paid_amount =  $this->total_bill + $this->return_amount;
        }else{
            $this->paid_amount =  $this->total_bill;
        }
        

        return view('livewire.manager.order', [
            'caregories' => Category::all(),
            'waiters' => Waiter::all(),
            'tables' => Table::all(),
            'orders' => ModelsOrder::latest()->get(),
        ]);
    }

    public function item_add_or_remove($item_id, $category_id, $sub_category_id = null)
    {
        $category_wise_item = CategoryWiseItem::where([
            'item_id' => $item_id,
            'category_id' =>  $category_id,
            'sub_category_id' =>  $sub_category_id,
        ])->first() ?? null;

        if ($category_wise_item) {
            if (in_array($category_wise_item->id, array_column($this->items_array, 'category_wise_item_id'), true)) {
                unset($this->items_array[array_search($category_wise_item->id, array_column($this->items_array, 'category_wise_item_id'))]);
                $this->alert('success', 'Remove');
            } else {
                array_push($this->items_array, [
                    'item_name' => $category_wise_item->item->name,
                    'sub_category_name' => SubCategory::find($sub_category_id)->name ?? null,
                    'item_single_price' => $category_wise_item->price,
                    'item_sub_total_price' => $category_wise_item->price,
                    'item_qty' => 1,
                    'category_wise_item_id' => $category_wise_item->id, //main identify key
                    'item_id' => $item_id, //need for btn identify
                    'category_id' =>  $category_id, //need for btn identify
                    'sub_category_id' =>  $sub_category_id, //need for btn identify
                ]);
                $this->alert('success', 'Select');
            }
            $this->items_array = array_values($this->items_array);
        } else {
            $this->alert('error', 'Not Found');
        }
    }

    public function increase_qty($array_key){
        $this->items_array[$array_key]['item_qty']++;
        $this->items_array[$array_key]['item_sub_total_price'] = $this->items_array[$array_key]['item_qty']*$this->items_array[$array_key]['item_single_price'];
        $this->alert('success', 'Increase QTY');
    }

    public function decrease_qty($array_key){
        if($this->items_array[$array_key]['item_qty'] > 1){
            $this->items_array[$array_key]['item_qty']--;
            $this->items_array[$array_key]['item_sub_total_price'] = $this->items_array[$array_key]['item_qty']*$this->items_array[$array_key]['item_single_price'];
            $this->alert('success', 'Decrease QTY');
        }else{
            $this->alert('error', 'Minimum 1 required');
        }
    }

    public function remove_item($array_key){
        unset($this->items_array[$array_key]);
        $this->alert('success', 'Remove item');
    }

    public function clear_items_array(){
        $this->items_array = [];
        $this->alert('success', 'Clear');
    }

    public function save_order(){
        if(empty($this->items_array)){
            $this->alert('error', 'Item not found');
        }else{
            $total_order_count_of_this_month = ModelsOrder::select('id')->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->count();
            ModelsOrder::create([
                'creator_id' => Auth::user()->id,
                'waiter_id' => $this->waiter,
                'table_id' => $this->parcel ? null : $this->table,
                'serial_number' => date('ym').sprintf("%'.05d\n", $total_order_count_of_this_month+1), //220700001
                'status' => 'Cook', //Penging, Reject, Cook, Serve, Complete
                'is_online' => false,
                'is_parcel' => $this->parcel ?? false,
                'customer_phone' =>  $this->phone,
                'customer_address' => $this->parcel ? $this->address : null,
                'paid_amount' => $this->paid_amount,
            ]);
            $this->phone = $this->address = $this->parcel = $this->waiter = $this->table = null;
            $this->receive_amount = $this->total_bill = $this->return_amount = 0;
            $this->items_array = [];
            $this->alert('success', 'Saved');

        }
    }

    public function change_status(ModelsOrder $order, $status){
        $order->update(['status' => $status]);
        $this->alert('success', 'Status Update');
    }
}
