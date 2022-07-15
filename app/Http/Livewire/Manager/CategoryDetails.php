<?php

namespace App\Http\Livewire\Manager;

use App\Models\Category;
use App\Models\Item;
use App\Models\SubCategory;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class CategoryDetails extends Component
{
    use LivewireAlert, WithFileUploads;

    public $category;
    public $sub_category_model, $sub_category_name;

    public $childs = [];

    public function mount(Category $category)
    {
        $this->category = $category;
    }
    public function render()
    {
        return view('livewire.manager.category-details', [
            'items' => Item::where('category_id', $this->category->id)->get(),
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
        foreach (SubCategory::where('category_id', $this->category->id)->get() as $sub_category) {
            array_push($this->sub_category_wise_price_array, [
                'sub_category_id' => $sub_category->id,
                'price' => null
            ]);
        }
    }

    public $sub_category_wise_price_array = [];
    public $category_id, $offline_active, $online_active, $name, $shortcut_number, $price, $image, $description;
    public $selected_model;
    public function submit_item()
    {
        $validate_data = $this->validate([
            'offline_active' => 'required|boolean',
            'online_active' => 'required|boolean',
            'name' => 'required|string',
            'shortcut_number' => 'required|numeric',
            'image' => 'nullable|image',
            'description' => 'nullable',
        ]);

        $validate_data['category_id'] = $this->category->id;

        $item = Item::firstOrCreate(
            [
                'name' =>  $this->name,
                'category_id' => $this->category->id
            ],
            $validate_data
        );
        $category_wise_item = [];
        if ($this->category->sub_category_required) {
            foreach ($this->sub_category_wise_price_array as $sub_category_wise_price) {
                if ($sub_category_wise_price['price']) {
                    array_push($category_wise_item, [
                        'item_id' => $item->id,
                        'sub_category_id' => $sub_category_wise_price['sub_category_id'],
                        'price' => $sub_category_wise_price['price'],
                    ]);
                }
            }
        }else{
            $category_wise_item = [
                'item_id' => $item->id,
                'sub_category_id' => null,
                'price' => $this->price,
            ];
        }
        dd($category_wise_item);
    }

    public function add_or_remove_child($key = null)
    {
        if ($key === null) {
            array_push($this->childs, []);
        } else {
            unset($this->childs[$key]);
        }
    }
}
