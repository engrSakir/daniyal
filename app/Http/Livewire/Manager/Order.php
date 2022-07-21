<?php

namespace App\Http\Livewire\Manager;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Order extends Component
{
    use LivewireAlert, WithFileUploads;

    public $category, $category_id;
    public $items_array = [];

    public function render()
    {
        if($this->category_id){
            $this->category = Category::find($this->category_id) ?? null;
        }
        return view('livewire.manager.order',[
            'caregories' => Category::all(),
            'category_wise_items' => CategoryWiseItem::where('category_id', $this->category_id)->get()
        ]);
    }

    public function item_add_or_remove(CategoryWiseItem $category_wise_item, $sub_category_id = null){
        $category = $category_wise_item->category;
        $data = [];
        if($category->has_sub_category){
            dd($category_wise_item->item_id, $category->id, $sub_category_id, price_helper($category_wise_item->item_id, $category->id, $sub_category_id));
            if(price_helper($category_wise_item->item_id, $category->id, $sub_category_id)){
                $data= [
                    'item_name'=> $category_wise_item->item->name,
                    'sub_category_name'=> SubCategory::find($sub_category_id)->name ?? null,
                    'item_price'=> price_helper($category_wise_item->item_id, $category->id, $sub_category_id) ,
                    'item_qty'=> 1,
                    'category_wise_item_id'=> $category_wise_item->id,
                ];
            }else{
                $this->alert('error', 'Item not define');
            }
        }else{
            $data= [
                'item_name'=> $category_wise_item->item->name,
                'sub_category_name'=> null,
                'item_price'=> $category_wise_item->price,
                'item_qty'=> 1,
                'category_wise_item_id'=> $category_wise_item->id,
            ];
        }
        array_push($this->items_array, $data);
        // dd($this->items_array);
    }
}
