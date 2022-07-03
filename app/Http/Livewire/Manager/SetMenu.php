<?php

namespace App\Http\Livewire\Manager;

use App\Models\Item;
use App\Models\SetMenu as ModelsSetMenu;
use App\Models\SetMenuWiseItem;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class SetMenu extends Component
{
    use LivewireAlert, WithFileUploads;

    public $offline_active, $online_active, $slug, $name, $banglish_name, $shortcut_number, $price, $image, $description;
    public $selected_items = [];
    public $selected_model;

    public function render()
    {
        return view('livewire.manager.set-menu',[
            'items' => Item::latest()->get(),
            'set_menues' => ModelsSetMenu::latest()->get(),
        ]);
    }

    public function create(){
        $this->offline_active = null;
        $this->online_active = null;
        $this->slug = null;
        $this->name = null;
        $this->banglish_name = null;
        $this->shortcut_number = null;
        $this->price = null;
        $this->image = null;
        $this->description = null;
        $this->selected_model = null;
        $this->selected_items = [];
    }

    public function submit(){
        $validate_data = $this->validate([
            'offline_active' => 'required|boolean',
            'online_active' => 'required|boolean',
            'slug' => 'required|string',
            'name' => 'required|string',
            'banglish_name' => 'required|string',
            'shortcut_number' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'description' => 'nullable',
        ]);
        if($this->selected_model){
            $model = $this->selected_model;
            $this->selected_model->update($validate_data);
            $this->alert('success', 'Updated');
        }else{
            $model = ModelsSetMenu::create($validate_data);
            $this->alert('success', 'Created');
        }
        foreach($this->selected_items as $item_id => $item){
            if($item['item_id'] && $item['quantity'] > 0){
                SetMenuWiseItem::create([
                    'set_menu_id' => $model->id,
                    'item_id' => $item_id,
                    'quantity' => $item['quantity']
                ]);
            }
        }
        $this->create();
    }

    public function select_model(ModelsSetMenu $model){
        $this->selected_model = $model;
        $this->offline_active = $model->offline_active;
        $this->online_active = $model->online_active;
        $this->slug = $model->slug;
        $this->name = $model->name;
        $this->banglish_name = $model->banglish_name;
        $this->shortcut_number = $model->shortcut_number;
        $this->price = $model->price;
        $this->image = $model->image;
        $this->description = $model->description;
        foreach ($model->set_menu_wisse_items as $item){
            // array_push($this->selected_items, [$item->item_id], [
            //     'item_id' => 1,
            //     'quantity' => 1
            // ]);
            // dd( $this->selected_items);
            $this->selected_items.$item->item_id->item_id = 1;
            $this->selected_items.$item->item_id->quantity = 1;
        }
        $this->selected_items = $model->set_menu_wisse_items()->select('item_id', 'set_menu_id');
    }

    public function delete(ModelsSetMenu $model){
        $this->selected_model = $model;
    }
}
