<?php

namespace App\Http\Livewire\Manager;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use Carbon\Carbon;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class CategoryDetails extends Component
{
    use LivewireAlert, WithFileUploads;

    public $category;
    public $sub_category_model, $sub_category_name;
    public $action_type, $selected_category_wise_item_model;

    public $childs = [];

    public function mount(Category $category)
    {
        $this->category = $category;
    }
    public function render()
    {
        return view('livewire.manager.category-details', [
            'category_wise_items' => CategoryWiseItem::where('category_id', $this->category->id)->get()->unique('item_id'),
            'sub_categories' => SubCategory::where('category_id', $this->category->id)->get(),
        ]);
    }

    public function create_sub_category()
    {
        $this->sub_category_model = $this->sub_category_name = null;
    }

    public function submit_sub_category()
    {
        $this->validate([
            'sub_category_name' => 'required|string'
        ]);
        if ($this->sub_category_model) {
            $this->sub_category_model->update(['name' => $this->sub_category_name]);
            $this->alert('success', 'Subcategory Updated');
        } else {
            SubCategory::create(['name' => $this->sub_category_name, 'category_id' => $this->category->id]);
            $this->alert('success', 'Subcategory Created');
        }
        $this->create_sub_category();
    }

    public function select_sub_category(SubCategory $subCategory)
    {
        $this->sub_category_model = $subCategory;
        $this->sub_category_name = $subCategory->name;
    }

    public function delete_sub_category(SubCategory $subCategory)
    {
        $subCategory->delete();
    }


    public function create_item()
    {
        $this->action_type = 'create';
        $this->offline_active = null;
        $this->online_active = null;
        $this->name = null;
        $this->shortcut_number = null;
        $this->image = null;
        $this->sub_category_wise_price_array = [];
        foreach (SubCategory::where('category_id', $this->category->id)->get() as $sub_category) {
            array_push($this->sub_category_wise_price_array, [
                'sub_category_id' => $sub_category->id,
                'price' => null,
            ]);
        }
    }

    public $sub_category_wise_price_array = [];
    public $category_id, $offline_active, $online_active, $name, $shortcut_number, $price, $image, $description;
    public $selected_model;
    public function submit_item()
    {
        $this->validate([
            'offline_active' => 'required|boolean',
            'online_active' => 'required|boolean',
            'name' => 'required|string',
            'shortcut_number' => 'required|numeric',
            'image' => 'nullable|image',
            'description' => 'nullable',
        ]);
        if($this->action_type == 'create'){
            $item = Item::firstOrCreate(
                [
                    'name' =>  $this->name,
                ],
                [
                    'name' => $this->name,
                    'image' => $this->image,
                    'description' => $this->description,
                ],
            );
            $category_wise_item = [];
            if ($this->category->has_sub_category) {
                foreach ($this->sub_category_wise_price_array as $sub_category_wise_price) {
                    if ($sub_category_wise_price['price']) {
                        array_push($category_wise_item, [
                            'item_id' => $item->id,
                            'category_id' => $this->category->id,
                            'sub_category_id' => $sub_category_wise_price['sub_category_id'],
                            'price' => $sub_category_wise_price['price'],
                            'offline_active' => $this->offline_active,
                            'offline_active' => $this->online_active,
                            'shortcut_number' => $this->shortcut_number,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
    
                        ]);
                    }
                }
            } else {
                $category_wise_item = [
                    'item_id' => $item->id,
                    'category_id' => $this->category->id,
                    'sub_category_id' => null,
                    'price' => $this->price,
                    'offline_active' => $this->offline_active,
                    'offline_active' => $this->online_active,
                    'shortcut_number' => $this->shortcut_number,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
            CategoryWiseItem::insert($category_wise_item);
            $this->alert('success', 'Item Created');
        }else if($this->action_type == 'edit'){
            $this->selected_category_wise_item_model->item->update([
                'name' => $this->name,
                'image' => $this->image,
                'description' => $this->description,
            ]);

            $category_wise_item = [];
            if ($this->category->has_sub_category) {
                foreach ($this->sub_category_wise_price_array as $sub_category_wise_price) {
                    if ($sub_category_wise_price['price']) {
                        CategoryWiseItem::where('category_id', $this->category->id)
                        ->where('sub_category_id', $sub_category_wise_price['sub_category_id'])
                        ->where('item_id', $this->selected_category_wise_item_model->item->id)
                        ->update([
                            'price' => $sub_category_wise_price['price'],
                            'offline_active' => $this->offline_active,
                            'offline_active' => $this->online_active,
                            'shortcut_number' => $this->shortcut_number,
                        ]);
                    }else{
                        CategoryWiseItem::where('category_id', $this->category->id)
                        ->where('sub_category_id', $sub_category_wise_price['sub_category_id'])
                        ->where('item_id', $this->selected_category_wise_item_model->item->id)
                        ->where('price', '!=', null)
                        ->update([
                            'offline_active' => $this->offline_active,
                            'offline_active' => $this->online_active,
                            'shortcut_number' => $this->shortcut_number,
                        ]);
                        $this->alert('info', 'Update without price');
                    }
                }
            } else {
                CategoryWiseItem::where('category_id', $this->category->id)
                ->where('sub_category_id', null)
                ->where('item_id', $this->selected_category_wise_item_model->item->id)
                ->update([
                    'price' => $this->price,
                    'offline_active' => $this->offline_active,
                    'offline_active' => $this->online_active,
                    'shortcut_number' => $this->shortcut_number,
                ]);
            }
            $this->alert('success', 'Item Updated');
        }
    }

    public function add_or_remove_child($key = null)
    {
        if ($key === null) {
            array_push($this->childs, []);
        } else {
            unset($this->childs[$key]);
        }
    }

    public function edit_item(CategoryWiseItem $category_wise_item){
        $this->action_type = 'edit';
        $this->selected_category_wise_item_model = $category_wise_item;
        $this->offline_active = $category_wise_item->offline_active;
        $this->online_active = $category_wise_item->online_active;
        $this->name = $category_wise_item->item->name;
        $this->shortcut_number = $category_wise_item->shortcut_number;
        $this->image = $category_wise_item->item->image;
        $this->sub_category_wise_price_array = [];
        if ($this->category->has_sub_category) {
            foreach (SubCategory::where('category_id', $this->category->id)->get() as $sub_category) {
                array_push($this->sub_category_wise_price_array, [
                    'sub_category_id' => $sub_category->id,
                    'price' => price_helper($category_wise_item->item_id, $category_wise_item->category_id, $sub_category->id),
                ]);
            }
        } else {
            $this->price = $category_wise_item->price;
        }
    }
}
