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
        if ($this->category_id) {
            $this->category = Category::find($this->category_id) ?? null;
        }
        return view('livewire.manager.order', [
            'caregories' => Category::all(),
        ]);
    }

    public function item_add_or_remove(CategoryWiseItem $category_wise_item, $sub_category_id = null)
    {
        if ($category_wise_item->category->has_sub_category) {
            $original_category_wise_item_model = CategoryWiseItem::where([
                'item_id' => $category_wise_item->item_id,
                'category_id' =>  $category_wise_item->category_id,
                'sub_category_id' =>  $sub_category_id,
            ])->first() ?? null;
            if ($original_category_wise_item_model) {
                if (in_array($original_category_wise_item_model->id, array_column($this->items_array, 'category_wise_item_id'), true)) {
                    unset($this->items_array[array_search($category_wise_item->id, array_column($this->items_array, 'category_wise_item_id'))]);
                    $this->alert('success', 'Remove 1');
                } else {
                    array_push($this->items_array, [
                        'item_name' => $original_category_wise_item_model->item->name,
                        'sub_category_name' => SubCategory::find($sub_category_id)->name ?? null,
                        'item_price' => $original_category_wise_item_model->price,
                        'item_qty' => 1,
                        'category_wise_item_id' => $original_category_wise_item_model->id,
                    ]);
                    $this->alert('success', 'Select 1');
                }
            } else {
                $this->alert('error', 'Item not define');
            }
        } else {
            if (in_array($category_wise_item->id, array_column($this->items_array, 'category_wise_item_id'), true)) {
                unset($this->items_array[array_search($category_wise_item->id, array_column($this->items_array, 'category_wise_item_id'))]);
                $this->alert('success', 'Remove 2');
            } else {
                array_push($this->items_array, [
                    'item_name' => $category_wise_item->item->name,
                    'sub_category_name' => null,
                    'item_price' => $category_wise_item->price,
                    'item_qty' => 1,
                    'category_wise_item_id' => $category_wise_item->id,
                ]);
                $this->alert('success', 'Select 2');
            }
        }
        $this->items_array = array_values($this->items_array);


    }
}
