<?php

namespace App\Http\Livewire\Admin;

use App\Models\PaymentMethod as ModelsPaymentMethod;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class PaymentMethod extends Component
{
    use LivewireAlert, WithFileUploads;

    public $model, $name;

    public function render()
    {
        return view('livewire.admin.payment-method',[
            'payment_methods' => ModelsPaymentMethod::all()
        ]);
    }
    public function create(){
        $this->model = $this->name = null;
    }

    public function submit(){
        $validate_data = $this->validate([
            'name' => 'required|unique:payment_methods,name'
        ]);
        if($this->model){
            $this->model->update($validate_data);
            $this->alert('success', 'Updated');
        }else{
            ModelsPaymentMethod::create($validate_data);
            $this->alert('success', 'Created');
        }
        $this->create();
    }

    public function select_model(ModelsPaymentMethod $model){
        $this->model = $model;
        $this->name = $model->name;
    }

    public function delete(ModelsPaymentMethod $model){
       $model->delete();
       $this->alert('success', 'Deleted');
    }
}

