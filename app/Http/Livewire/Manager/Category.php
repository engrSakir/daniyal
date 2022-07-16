<?php

namespace App\Http\Livewire\Manager;

use App\Models\Category as ModelsCategory;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Category extends Component
{
    use LivewireAlert, WithFileUploads;

    public $offline_active, $online_active, $name, $image;
    public $selected_model;

    public function render()
    {
        return view('livewire.manager.category',[
            'categories' => ModelsCategory::all()
        ]);
    }

    public function create(){
        $this->offline_active = null;
        $this->online_active = null;
        $this->name = null;
        $this->image = null;
        $this->selected_model = null;
    }

    public function submit(){
        $validate_data = $this->validate([
            'offline_active' => 'required|boolean',
            'online_active' => 'required|boolean',
            'name' => 'required|string',
            'image' => 'nullable|image',
        ]);
        if($this->selected_model){
            $this->selected_model->update($validate_data);
            $this->alert('success', 'Updated');
        }else{
            ModelsCategory::create($validate_data);
            $this->alert('success', 'Created');
        }
        $this->create();
    }

    public function select_model(ModelsCategory $model){
        $this->selected_model = $model;
        $this->offline_active = $model->offline_active;
        $this->online_active = $model->online_active;
        $this->name = $model->name;
        $this->image = $model->image;
    }

    public function delete(ModelsCategory $model){
        $this->selected_model = $model;
        $this->alert('success', 'Success');
    }
}
