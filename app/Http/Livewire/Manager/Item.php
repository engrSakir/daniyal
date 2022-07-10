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

    public $category_id, $offline_active, $online_active, $name, $shortcut_number, $price, $image, $description;
    public $selected_model;

    public function render()
    {
        return view('livewire.manager.item',[
            'categories' => Category::where('type', 'Item')->latest()->get(),
            'items' => ModelsItem::latest()->get()
        ]);
    }

    public function create(){
        $this->category_id = null;
        $this->offline_active = null;
        $this->online_active = null;
        $this->name = null;
        $this->shortcut_number = null;
        $this->price = null;
        $this->image = null;
        $this->description = null;
        $this->selected_model = null;
    }

    public function submit(){
        $validate_data = $this->validate([
            'category_id' => 'required|exists:categories,id',
            'offline_active' => 'required|boolean',
            'online_active' => 'required|boolean',
            'name' => 'required|string',
            'shortcut_number' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'description' => 'nullable',
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
        $this->name = $model->name;
        $this->shortcut_number = $model->shortcut_number;
        $this->price = $model->price;
        $this->image = $model->image;
        $this->description = $model->description;
    }

    public function delete(ModelsItem $model){
        $this->selected_model = $model;
    }
}
