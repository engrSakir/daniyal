<?php

namespace App\Http\Livewire\Manager;

use App\Models\Table as ModelsTable;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Table extends Component
{
    use LivewireAlert, WithFileUploads;

    public $model, $name;
    public function render()
    {
        return view('livewire.manager.table',[
            'tables' => ModelsTable::all()
        ]);
    }

    public function create(){
        $this->model = $this->name = null;
    }

    public function submit(){
        $validate_data = $this->validate([
            'name' => 'required|unique:tables,name'
        ]);
        if($this->model){
            $this->model->update($validate_data);
            $this->alert('success', 'Updated');
        }else{
            ModelsTable::create($validate_data);
            $this->alert('success', 'Created');
        }
        $this->create();
    }

    public function select_model(ModelsTable $model){
        $this->model = $model;
        $this->name = $model->name;
    }

    public function delete(ModelsTable $model){
       $model->delete();
       $this->alert('success', 'Deleted');
    }
}
