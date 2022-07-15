<?php

namespace App\Http\Livewire\Manager;

use App\Models\SetMenu as ModelsSetMenu;
use App\Models\SetMenuWiseItem;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class SetMenu extends Component
{
    use LivewireAlert, WithFileUploads;

    public $offline_active, $online_active, $name, $shortcut_number, $price, $image, $description;
    public $items_array = [];
    public $selected_model;

    public function render()
    {
        return view('livewire.manager.set-menu', [
            'set_menues' => ModelsSetMenu::latest()->get(),
        ]);
    }

    public function create()
    {
        $this->offline_active = null;
        $this->online_active = null;
        $this->name = null;
        $this->shortcut_number = null;
        $this->price = null;
        $this->image = null;
        $this->description = null;
        $this->selected_model = null;
        $this->items_array = [];
    }

    public function submit()
    {
        $validate_data = $this->validate([
            'offline_active' => 'required|boolean',
            'online_active' => 'required|boolean',
            'name' => 'required|string',
            'shortcut_number' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'description' => 'nullable',            
            'items_array.*name' => 'required|string',
        ]);
        unset($validate_data['items_array']);
        if ($this->selected_model) {
            $model = $this->selected_model;
            $this->selected_model->update($validate_data);
            // Delete all which are minus item
            SetMenuWiseItem::whereNotIn('id', array_column($this->items_array, 'id'))->delete();
            $this->alert('success', 'Updated');
        } else {
            $model = ModelsSetMenu::create($validate_data);
            $this->alert('success', 'Created');
        }
        foreach ($this->items_array as $item_array) {
            if (isset($item_array['id'])) {
                $setMenuWiseItem = SetMenuWiseItem::find($item_array['id']);
            } else {
                $setMenuWiseItem = new SetMenuWiseItem();
            }
            $setMenuWiseItem->set_menu_id = $model->id;
            $setMenuWiseItem->name = $item_array['name'];
            $setMenuWiseItem->save();
        }
        $this->create();
    }

    public function select_model(ModelsSetMenu $model)
    {
        $this->selected_model = $model;
        $this->offline_active = $model->offline_active;
        $this->online_active = $model->online_active;
        $this->name = $model->name;
        $this->shortcut_number = $model->shortcut_number;
        $this->price = $model->price;
        $this->image = $model->image;
        $this->description = $model->description;
        $this->items_array = [];
        foreach ($model->set_menu_wisse_items as $item) {
            array_push($this->items_array, [
                'id' => $item->id,
                'name' => $item->name,
            ]);
        }
    }

    public function delete(ModelsSetMenu $model)
    {
        $this->selected_model = $model;
        $this->alert('success', 'Deleted');
    }

    public function add_or_remove_items($key = null)
    {
        // array_push($this->items_array, []);
        if ($key === null) {
            array_push($this->items_array, []);
        } else {
            unset($this->items_array[$key]);
        }
    }
}
