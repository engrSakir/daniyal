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
    public function get_products(){
        $products = [];
        $items = Item::withCount('category_wise_items')->get();
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $waiters = Waiter::all();
        $tables = Table::all();
        $payment_methods = PaymentMethod::where('active_to_outlet', true)->get();

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
        return json_decode(collect($products));
    }
}
