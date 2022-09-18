<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use App\Models\Waiter;
use App\Models\Table;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function get_products()
    {
        $products = [];

        $items = Item::withCount('category_wise_items')->get();
        foreach ($items as $item) {
            if ($item->category_wise_items_count == 1) {
                $category_wise_item = $item->category_wise_items()->first();
                array_push($products, [
                    'multiple' => false,
                    'category_wise_item_id' => $category_wise_item->id,
                    'category_id' => $category_wise_item->category_id,
                    'name' => $item->name,
                    'price' => $category_wise_item->price,
                    'category' => $category_wise_item->category->name ?? null,
                    'sub_category' => $category_wise_item->sub_category->name ?? null,
                ]);
            } else {
                $category_wise_items = [];
                foreach ($item->category_wise_items as $category_wise_item) {
                    array_push($category_wise_items, [
                        'category_wise_item_id' => $category_wise_item->id,
                        'category_id' => $category_wise_item->category_id,
                        'name' => $item->name,
                        'price' => $category_wise_item->price,
                        'category' => $category_wise_item->category->name ?? null,
                        'sub_category' => $category_wise_item->sub_category->name ?? null,
                    ]);
                }

                array_push($products, [
                    'multiple' => true,
                    'category_wise_item_id' => null,
                    'name' => $item->name,
                    'price' => null,
                    'category' => null,
                    'sub_category' => null,
                    'category_wise_items' => $category_wise_items
                ]);
            }
        }

        return json_decode(collect([
            'items' => $products,
            'categories' => Category::all(),
            'waiters' => Waiter::all(),
            'tables' => Table::all(),
            'payment_methods' => PaymentMethod::where('active_to_outlet', true)->get(),
        ]));
    }

    public function get_products2()
    {
        $products = [];
        
        $category_wise_items = CategoryWiseItem::with('item')->get();
        foreach($category_wise_items as $category_wise_item){
            array_push($products, [
                'id' => $category_wise_item->item_id,
                'name' => $category_wise_item->item->name,
                'price' => $category_wise_item->price,
                'category' => $category_wise_item->category->name ?? null,
                'sub_category' => $category_wise_item->sub_category->name ?? null,
            ]);
        }

        return json_decode(collect([
            'items' => $products,
            'categories' => Category::all(),
            'waiters' => Waiter::all(),
            'tables' => Table::all(),
            'payment_methods' => PaymentMethod::where('active_to_outlet', true)->get(),
        ]));
    }
}
