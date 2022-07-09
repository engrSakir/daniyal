<?php

namespace App\Http\Livewire\Manager;

use App\Models\Category;
use App\Models\Item;
use App\Models\SetMenu as ModelsSetMenu;
use App\Models\SetMenuWiseItem;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class SetMenu extends Component
{
    use LivewireAlert, WithFileUploads;

    public $category_id, $offline_active, $online_active, $name, $shortcut_number, $price, $image, $description;
    public $items_array = [];
    public $selected_model;

    public function render()
    {
        return view('livewire.manager.set-menu', [
            'categories' => Category::where('type', 'Set Menu')->latest()->get(),
            'items' => Item::latest()->get(),
            'set_menues' => ModelsSetMenu::latest()->get(),
        ]);
    }

    public function create()
    {
        $this->category_id = null;
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
            'category_id' => 'required|exists:categories,id',
            'offline_active' => 'required|boolean',
            'online_active' => 'required|boolean',
            'name' => 'required|string',
            'shortcut_number' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'description' => 'nullable',
            'items_array.*item_id' => 'required|exists:items,id',
            'items_array.*.item_quantity' => 'required|numeric|min:0',
        ]);
        unset($validate_data['items_array']);
        if ($this->selected_model) {
            $model = $this->selected_model;
            $this->selected_model->update($validate_data);
            // Delete all which are minus item
            SetMenuWiseItem::whereNotIn('id', array_column($this->items_array, 'set_menu_wise_item_id'))->delete();
            $this->alert('success', 'Updated');
        } else {
            $model = ModelsSetMenu::create($validate_data);
            $this->alert('success', 'Created');
        }
        foreach ($this->items_array as $item_array) {
            if (isset($item_array['set_menu_wise_item_id'])) {
                $setMenuWiseItem = SetMenuWiseItem::find($item_array['set_menu_wise_item_id']);
            } else {
                $setMenuWiseItem = new SetMenuWiseItem();
            }
            $setMenuWiseItem->set_menu_id = $model->id;
            $setMenuWiseItem->item_id = $item_array['item_id'];
            $setMenuWiseItem->quantity = $item_array['item_quantity'];
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
        foreach ($model->set_menu_wisse_items as $item) {
            array_push($this->items_array, [
                'set_menu_wise_item_id' => $item->id,
                'item_id' => $item->item_id,
                'item_quantity' => $item->quantity
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

    public function remove_items_array()
    {
        array_push($this->items_array, []);
    }
}
