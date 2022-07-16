<?php

namespace App\Http\Livewire\Manager;

use App\Models\Waiter as ModelsWaiter;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Waiter extends Component
{
    use LivewireAlert, WithFileUploads;

    public $model, $name;

    public function render()
    {
        return view('livewire.manager.waiter',[
            'waiters' => ModelsWaiter::all()
        ]);
    }
    public function create(){
        $this->model = $this->name = null;
    }

    public function submit(){
        $validate_data = $this->validate([
            'name' => 'required|unique:waiters,name'
        ]);
        if($this->model){
            $this->model->update($validate_data);
            $this->alert('success', 'Updated');
        }else{
            ModelsWaiter::create($validate_data);
            $this->alert('success', 'Created');
        }
        $this->create();
    }

    public function select_model(ModelsWaiter $model){
        $this->model = $model;
        $this->name = $model->name;
    }

    public function delete(ModelsWaiter $model){
       $model->delete();
       $this->alert('success', 'Deleted');
    }
}

