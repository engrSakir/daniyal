<?php

namespace App\Http\Controllers;

use App\Http\Requests\PosRequest;
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


    public function save(Request $request){

        // return $request->parcel;
        $request->validate([
            'waiter' => 'required|exists:waiters,id',
            'parcel' => 'required|boolean',
            'table' => 'required_if:parcel,0',
            'address' => 'nullable|string',
            'phone' => 'required_if:parcel,1',
            'discount_percentage' => 'nullable|numeric|min:0',
            'discount_fixed_amount' => 'nullable|numeric|min:0',
            "items"    => "required|array|min:1",
            "items.*.id"  => "required|exists:category_wise_items,id",
            "items.*.quantity"  => "required|numeric|min:1",
        ]);
        $request->validate([
            'phone' => 'nullable|min:11|max:11|string',
            'table' => 'nullable|exists:tables,id',
        ]);

        return $request->all();


        $item_list = $request['basket'];


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
                $order->waiter_id = $request->waiter;
                $order->table_id = $request->parcel ? null : $request->table;
                $order->is_online = false;
                $order->is_parcel = $request->parcel;
                $order->customer_phone =  $request->phone;
                $order->customer_address = $request->parcel ? $request->address : null;
                $order->paid_amount = round($total_price - ((($order_data['discount_percentage'] ?? 0) / 100) * $total_price) - ($order_data['discount_fixed_amount'] ?? 0), 0);
                $order->delivery_fee = $request->parcel ? $request->delivery_charge : 0;
                $order->discount_percentage = $request->discount_percentage ?? 0;
                $order->discount_fixed_amount = $request->discount_fixed_amount ?? 0;
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
