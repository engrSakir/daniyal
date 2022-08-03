<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index(){
        return view('pos.index', [
            'items' => Item::withCount('category_wise_items')->get(),
            'category_wise_items' => CategoryWiseItem::with(['category'])->get(),
            'sub_categories' => SubCategory::all()
        ]);
    }
}
