<?php

namespace App\Http\Livewire\Manager;

use App\Models\PlatterMenu as ModelsPlatterMenu;
use App\Models\PlatterMenuWiseItem;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class PlatterMenu extends Component
{
    use LivewireAlert, WithFileUploads;

    public $offline_active, $online_active, $name, $shortcut_number, $price, $image, $description;
    public $items_array = [];
    public $selected_model;

    public function render()
    {
        return view('livewire.manager.platter-menu', [
            'platter_menus' => ModelsPlatterMenu::latest()->get(),
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
            PlatterMenuWiseItem::where('platter_menu_id', $model->id)->whereNotIn('id', array_column($this->items_array, 'id'))->delete();
            $this->alert('success', 'Updated');
        } else {
            $model = ModelsPlatterMenu::create($validate_data);
            $this->alert('success', 'Created');
        }
        foreach ($this->items_array as $item_array) {
            if (isset($item_array['id'])) {
                $platterMenuWiseItem = PlatterMenuWiseItem::find($item_array['id']);
            } else {
                $platterMenuWiseItem = new PlatterMenuWiseItem();
            }
            $platterMenuWiseItem->platter_menu_id = $model->id;
            $platterMenuWiseItem->name = $item_array['name'];
            $platterMenuWiseItem->save();
        }
        $this->create();
    }

    public function select_model(ModelsPlatterMenu $model)
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
        foreach ($model->platter_menu_wisse_items as $item) {
            array_push($this->items_array, [
                'id' => $item->id,
                'name' => $item->name,
            ]);
        }
    }

    public function delete(ModelsPlatterMenu $model)
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
