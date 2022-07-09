<?php

namespace App\Http\Livewire\Manager;

use App\Models\Category;
use App\Models\Item;
use App\Models\Offer as ModelsOffer;
use App\Models\SetMenu;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Offer extends Component
{
    use LivewireAlert, WithFileUploads;

    public $selected_model, $category_id, $type, $item_id, $set_menu_id, $issue_date, $expire_date, $name, $image, $discount_percentage, $discount_fixed_amount, $buy_qty, $get_qty, $offline_active, $online_active;

    public function render()
    {
        if($this->category_id){
            $this->type = Category::find($this->category_id)->type ?? null;
        }
        return view('livewire.manager.offer', [
            'categories' => Category::latest()->get(),
            'items' => Item::where('category_id', $this->category_id)->get(),
            'set_menues' => SetMenu::where('category_id', $this->category_id)->get(),
        ]);
    }

    public function create(){
        $this->category_id = $this->type = $this->item_id = $this->set_menu_id = 
        $this->issue_date = $this->expire_date = $this->name = $this->image = $this->discount_percentage = 
        $this->discount_fixed_amount = $this->buy_qty = $this->get_qty = $this->offline_active = 
        $this->online_active = null;
    }

    public function submit(){
        $validate_data = $this->validate([
            'category_id' => 'required|exists:categories,id',
            'type' => 'required',
            'item_id' => 'required_if:type,==,Item',
            'set_menu_id' => 'required_if:type,==,Set Menu',
            'issue_date' => 'required|date',
            'expire_date' => 'required|date',
            'name' => 'required|string',
            'image' => 'nullable|image',
            'discount_percentage' => 'required|numeric|min:0',
            'discount_fixed_amount' => 'required|numeric|min:0',
            'buy_qty' => 'required|numeric|min:0',
            'get_qty' => 'required|numeric|min:0',
            'offline_active' => 'required|boolean',
            'online_active' => 'required|boolean',
        ]);
        unset($validate_data['category_id']);
        unset($validate_data['type']);
        if($this->selected_model){
            $this->selected_model->update($validate_data);
            $this->alert('success', 'Updated');
        }else{
            ModelsOffer::create($validate_data);
            $this->alert('success', 'Created');
        }
        $this->create();
    }

    public function select_model(ModelsOffer $model){
        $this->selected_model = $model;
        $this->category_id = $model->category_id;
        $this->offline_active = $model->offline_active;
        $this->online_active = $model->online_active;
        $this->slug = $model->slug;
        $this->name = $model->name;
        $this->shortcut_number = $model->shortcut_number;
        $this->price = $model->price;
        $this->image = $model->image;
        $this->description = $model->description;
    }

    public function delete(ModelsOffer $model){
        $this->selected_model = $model;
    }
}
