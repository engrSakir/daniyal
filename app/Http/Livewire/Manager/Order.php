<?php

namespace App\Http\Livewire\Manager;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\Order as ModelsOrder;
use App\Models\OrderItem;
use App\Models\SubCategory;
use App\Models\Table;
use App\Models\Waiter;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Order extends Component
{
    use LivewireAlert, WithFileUploads;

    public $category, $category_id;
    public $items_array = [];
    public $parcel, $phone, $address, $paid_amount, $waiter, $table, $delivery_charge;
    public $receive_amount, $total_bill, $return_amount;
    public $selected_order_model_for_edit;

    public function render()
    {
        if ($this->category_id) {
            $this->category = Category::find($this->category_id) ?? null;
        }

        $this->total_bill = collect($this->items_array)->sum('item_sub_total_price') ?? 0;
        $this->return_amount = ((int)$this->receive_amount) - $this->total_bill;
        if ($this->return_amount < 0) {
            $this->paid_amount =  $this->total_bill + $this->return_amount;
        } else {
            $this->paid_amount =  $this->total_bill;
        }


        return view('livewire.manager.order', [
            'caregories' => Category::all(),
            'waiters' => Waiter::all(),
            'tables' => Table::all(),
            'orders' => ModelsOrder::whereDate('created_at', Carbon::today())->latest()->get(),
        ]);
    }

    public function item_add_or_remove($item_id, $category_id, $sub_category_id = null, $qty = 1, $editable_order_item_id = null)
    {
        $category_wise_item = CategoryWiseItem::where([
            'item_id' => $item_id,
            'category_id' =>  $category_id,
            'sub_category_id' =>  $sub_category_id,
        ])->first() ?? null;

        if ($category_wise_item) {
            if (in_array($category_wise_item->id, array_column($this->items_array, 'category_wise_item_id'), true)) {
                unset($this->items_array[array_search($category_wise_item->id, array_column($this->items_array, 'category_wise_item_id'))]);
                $this->alert('success', 'Remove', [
                    'position' => 'bottom-start'
                ]);
            } else {
                array_push($this->items_array, [
                    'item_name' => $category_wise_item->item->name,
                    'sub_category_name' => SubCategory::find($sub_category_id)->name ?? null,
                    'item_single_price' => $category_wise_item->price,
                    'item_sub_total_price' => $category_wise_item->price,
                    'item_qty' => $qty,
                    'category_wise_item_id' => $category_wise_item->id, //main identify key
                    'item_id' => $item_id, //need for btn identify (selected color)
                    'category_id' =>  $category_id, //need for btn identify (selected color)
                    'sub_category_id' =>  $sub_category_id, //need for btn identify (selected color)
                    'offer_id' =>  null,
                    'editable_order_item_id' =>  $editable_order_item_id,
                ]);
                $this->alert('success', 'Select', [
                    'position' => 'bottom-start'
                ]);
            }
            $this->items_array = array_values($this->items_array);
        } else {
            $this->alert('error', 'Not Found', [
                'position' => 'center'
            ]);
        }
    }

    public function increase_qty($array_key)
    {
        $this->items_array[$array_key]['item_qty']++;
        $this->items_array[$array_key]['item_sub_total_price'] = $this->items_array[$array_key]['item_qty'] * $this->items_array[$array_key]['item_single_price'];
        $this->alert('success', 'Increase QTY', [
            'position' => 'bottom-start'
        ]);
    }

    public function decrease_qty($array_key)
    {
        if ($this->items_array[$array_key]['item_qty'] > 1) {
            $this->items_array[$array_key]['item_qty']--;
            $this->items_array[$array_key]['item_sub_total_price'] = $this->items_array[$array_key]['item_qty'] * $this->items_array[$array_key]['item_single_price'];
            $this->alert('success', 'Decrease QTY', [
                'position' => 'bottom-start'
            ]);
        } else {
            $this->alert('error', 'Minimum 1 required', [
                'position' => 'center'
            ]);
        }
    }

    public function remove_item($array_key)
    {
        unset($this->items_array[$array_key]);
        $this->alert('success', 'Remove item', [
            'position' => 'bottom-start'
        ]);
    }

    public function clear_items_array()
    {
        $this->items_array = [];
        $this->selected_order_model_for_edit = null;
        $this->alert('success', 'Clear', [
            'position' => 'bottom-start'
        ]);
    }

    public function save_order()
    {
        if (empty($this->items_array)) {
            $this->alert('error', 'Item not found', [
                'position' => 'center'
            ]);
        } else {
            $this->validate([
                'delivery_charge' => 'required_if:parcel,1',
                'table' => 'required_without:parcel',
                'waiter' => 'required_without:parcel',

            ]);
            $total_order_count_of_this_month = ModelsOrder::select('id')->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->count();
            if ($this->selected_order_model_for_edit) {
                $order = $this->selected_order_model_for_edit;
                // Delete all removed order_items from db
                OrderItem::whereIn('id', $this->selected_order_model_for_edit->order_items()->whereNotIn('id', array_column($this->items_array, 'editable_order_item_id'))->pluck('id'))->delete();
            } else {
                $order = new ModelsOrder();
                $order->creator_id = Auth::user()->id;
                $order->serial_number = date('ym') . sprintf("%'.05d", $total_order_count_of_this_month + 1); //220700001
                $order->status = 'Cook'; //Penging, Reject, Cook, Serve, Complete
            }
            $order->waiter_id = $this->waiter;
            $order->table_id = $this->parcel ? null : $this->table;
            $order->is_online = false;
            $order->is_parcel = $this->parcel ?? false;
            $order->customer_phone =  $this->phone;
            $order->customer_address = $this->parcel ? $this->address : null;
            $order->paid_amount = $this->paid_amount;
            $order->save();

            //Items
            foreach ($this->items_array as $item) {
                $category_wise_item = CategoryWiseItem::find($item['category_wise_item_id']);

                if ($item['editable_order_item_id']) {
                    $order_item = OrderItem::find($item['editable_order_item_id']);
                } else {
                    $order_item = new OrderItem();
                }
                $order_item->order_id = $order->id;
                $order_item->category_wise_item_id = $category_wise_item->id;
                $order_item->original_price = $category_wise_item->price;
                $order_item->offer_id = $item['offer_id'];
                $order_item->selling_price = $item['offer_id'] ? $item['item_single_price'] : $category_wise_item->price;
                $order_item->quantity = $item['item_qty'];
                $order_item->save();
            }

            //Make clear
            $this->phone = $this->address = $this->parcel = $this->waiter = $this->table = null;
            $this->receive_amount = $this->total_bill = $this->return_amount = 0;
            $this->items_array = [];
            $this->selected_order_model_for_edit = null;
            $this->alert('success', 'Saved', [
                'position' => 'bottom-start'
            ]);
        }
    }

    public function change_status(ModelsOrder $order, $status)
    {
        $order->update(['status' => $status]);
        $this->alert('success', 'Status Update', [
            'position' => 'bottom-start'
        ]);
    }

    public function print(ModelsOrder $order)
    {
        dd($order->status);
    }

    public function edit(ModelsOrder $order)
    {
        if ($order->status == 'Complete') {
            $this->alert('error', 'Order is not editable', [
                'position' => 'center'
            ]);
        } else {
            $this->selected_order_model_for_edit = $order;
            $this->waiter = $order->waiter_id;
            $this->table = $order->table_id;
            $this->parcel = $order->is_parcel;
            $this->phone = $order->phone;
            $this->address = $order->address;
            $this->paid_amount = $order->paid_amount;

            $this->items_array = [];
            
            foreach ($order->order_items as $order_item) {
                $this->item_add_or_remove(
                    $order_item->category_wise_item->item_id, 
                    $order_item->category_wise_item->category_id, 
                    $order_item->category_wise_item->sub_category_id, 
                    $order_item->quantity, 
                    $order_item->id);
            }
            $this->alert('success', 'Select for edit', [
                'position' => 'bottom-start'
            ]);
        }
    }

    public function delete(ModelsOrder $order)
    {
        $order->delete();
        $this->alert('success', 'Successfully deleted', [
            'position' => 'bottom-start'
        ]);
    }
}
