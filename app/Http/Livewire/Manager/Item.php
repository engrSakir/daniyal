<?php

namespace App\Http\Livewire\Manager;

use App\Models\Category;
use App\Models\Item as ModelsItem;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Item extends Component
{
    use LivewireAlert, WithFileUploads;

    public $category_id, $offline_active, $online_active, $slug, $name, $banglish_name, $product_number, $price, $image;
    public $selected_model;

    public function render()
    {
        return view('livewire.manager.item',[
            'categories' => Category::all(),
            'items' => ModelsItem::latest()->get()
        ]);
    }

    public function create(){
        $this->category_id = null;
        $this->offline_active = null;
        $this->online_active = null;
        $this->slug = null;
        $this->name = null;
        $this->banglish_name = null;
        $this->product_number = null;
        $this->price = null;
        $this->image = null;
        $this->selected_model = null;
    }

    public function store(){
        $validate_data = $this->validate([
            'category_id' => 'required|exists:categories,id',
            'offline_active' => 'required|boolean',
            'online_active' => 'required|boolean',
            'slug' => 'required|string',
            'name' => 'required|string',
            'banglish_name' => 'required|string',
            'product_number' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
        ]);
        if($this->selected_model){
            $this->selected_model->update($validate_data);
            $this->alert('success', 'Updated');
        }else{
            ModelsItem::create($validate_data);
            $this->alert('success', 'Created');
        }
        $this->create();
    }

    public function select_model(ModelsItem $model){
        $this->selected_model = $model;
        $this->category_id = $model->category_id;
        $this->offline_active = $model->offline_active;
        $this->online_active = $model->online_active;
        $this->slug = $model->slug;
        $this->name = $model->name;
        $this->banglish_name = $model->banglish_name;
        $this->product_number = $model->product_number;
        $this->price = $model->price;
        $this->image = $model->image;
    }

    public function update(){

    }

    public function delete(ModelsItem $model){
        $this->selected_model = $model;
    }
}
