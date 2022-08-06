<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\SubCategory;
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


    public function save($item_list){

        $item_list = json_decode($item_list, true);

        if (count($item_list) > 0) {
            $total_price = 0;
            foreach ($item_list as $item) {
                $total_price += ($item['price'] * $item['quantity']);
            }
            try {
                $order = Order::create([
                    'paid_amount' => $total_price,
                ]);

                foreach ($item_list as $item) {
                    OrderItem::create([
                        'invoice_id' => $order->id,
                        'product_id' => 1,
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                    ]);
                }

                $response = [
                    'type' => 'success',
                    'message' => 'Success',
                    'invoice_url' => route('order.show', $order->id)
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
