<?php

namespace App\Http\Controllers;

use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\SubCategory;
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
        $request->validate([
            'waiter' => 'required|exists:waiters,id',
            'parcel' => 'required|boolean',
            'table' => 'required_if:parcel,0',
            'address' => 'nullable|string',
            'phone' => 'nullable|min:11|max:11|string',
            'delivery_charge' => 'required_if:parcel,1|numeric:min:0',
            'discount_percentage' => 'nullable|numeric|min:0',
            'discount_fixed_amount' => 'nullable|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
            'payable_amount' => 'required|numeric|min:0',
            "items"    => "required|array|min:1",
            "items.*.id"  => "required|exists:category_wise_items,id",
            "items.*.quantity"  => "required|numeric|min:1",
        ]);
        $request->validate([
            'table' => 'nullable|exists:tables,id',
        ]);

        if($request->parcel){
            $request->table = null;
        }else{
            $request->address = null;
            $request->delivery_charge = 0;
        }

            try {
                $total_order_count_of_this_month = Order::select('id')->whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->count();
                $order = new Order();
                $order->creator_id = Auth::user()->id;
                $order->serial_number = date('ym') . sprintf("%'.05d", $total_order_count_of_this_month + 1); //220700001
                $order->status = 'Cook'; //Penging, Reject, Cook, Serve, Complete
                $order->waiter_id = $request->waiter;
                $order->table_id = $request->table;
                $order->is_online = false;
                $order->is_parcel = $request->parcel;
                $order->customer_phone =  $request->phone;
                $order->customer_address = $request->address;
                $order->payable_amount = round($request->payable_amount, 0);
                $order->paid_amount = round($request->paid_amount, 0);
                $order->delivery_fee = round($request->delivery_charge, 0);
                $order->discount_percentage = $request->discount_percentage ?? 0;
                $order->discount_fixed_amount = $request->discount_fixed_amount ?? 0;
                $order->save();

                //Items
                foreach ($request->items as $item) {
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
        
        return $response;
    }

}
