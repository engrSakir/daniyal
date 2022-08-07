<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\SubCategory;
use App\Models\Table;
use App\Models\Waiter;
use Auth;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index()
    {
        return view('pos.index', [
            'items' => Item::withCount('category_wise_items')->get(),
            'category_wise_items' => CategoryWiseItem::with(['category'])->get(),
            'sub_categories' => SubCategory::all()
        ]);
    }


    public function save($order_data){

        $order_data = json_decode($order_data, true);

        $item_list = $order_data['basket'];

        $error_messages = [];

        if(!Waiter::find($order_data['waiter'])){
            array_push($error_messages, 'Select waiter');
        }

        if($order_data['table'] == '' || $order_data['parcel'] == 1){
            $order_data['table'] = null;
        }
        
        if($order_data['parcel'] == 0 && !Table::find($order_data['table'])){
            array_push($error_messages, 'Select table');
        }
   
        if($order_data['phone'] == ''){
            $order_data['phone'] = null;
        }

        if($order_data['discount_percentage'] == ''){
            $order_data['discount_percentage'] = null;
        }

        if($order_data['phone'] && !is_numeric($order_data['phone'])){
            
            array_push($error_messages, 'Use numeric phone number');
        }
        
        if($order_data['phone'] && strlen($order_data['phone']) != 11){
            array_push($error_messages, 'Use 11 digit phone number');
        }

        if($order_data['discount_percentage'] && !is_numeric($order_data['discount_percentage'])){
            array_push($error_messages, 'Use numeric discount');
        }

        if(count($error_messages) > 0){
            return [
                'type' => 'error',
                'messages' => $error_messages,
            ];
        }

        

        if (count($item_list) > 0) {
            $total_price = 0;
            foreach ($item_list as $item) {
                $total_price += ($item['price'] * $item['quantity']);
            }
            try {
                $total_order_count_of_this_month = Order::select('id')->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->count();
                $order = new Order();
                $order->creator_id = Auth::user()->id;
                $order->serial_number = date('ym') . sprintf("%'.05d", $total_order_count_of_this_month + 1); //220700001
                $order->status = 'Cook'; //Penging, Reject, Cook, Serve, Complete
                $order->waiter_id = $order_data['waiter'];
                $order->table_id = $order_data['parcel'] ? null : $order_data['table'];
                $order->is_online = false;
                $order->is_parcel = $order_data['parcel'] ?? false;
                $order->customer_phone =  $order_data['phone'];
                $order->customer_address = $order_data['parcel'] ? $order_data['address'] : null;
                $order->paid_amount = $total_price;
                $order->delivery_fee = $order_data['parcel'] ? $order_data['delivery_charge'] : 0;
                $order->save();

                //Items
                foreach ($item_list as $item) {
                    if($item['quantity'] > 0){
                        $category_wise_item = CategoryWiseItem::find($item['id']);
                        $order_item = new OrderItem();
                        $order_item->order_id = $order->id;
                        $order_item->category_wise_item_id = $category_wise_item->id;
                        $order_item->original_price = $category_wise_item->price;
                        $order_item->offer_id = $item['offer_id'];
                        $order_item->selling_price = $item['offer_id'] ? $item['item_single_price'] : $category_wise_item->price;
                        $order_item->quantity = $item['quantity'];
                        $order_item->save();
                    }
                }

                $response = [
                    'type' => 'success',
                    'message' => 'Success',
                    'invoice_url' => route('manager.invoice', $order->id)
                ];
            } catch (\Exception $e) {
                $response = [
                    'type' => 'error',
                    'message' => $e->getMessage()
                ];
            }
        } else {
            $response = [
                'type' => 'error',
                'message' => 'Sales item not found'
            ];
        }
        return $response;
    }

}
