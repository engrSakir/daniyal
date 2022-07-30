<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class Manager extends Component
{
    use LivewireAlert;

    public $name, $phone, $password;
    public $selected_model;

    public function render()
    {
        return view('livewire.admin.manager',[
            'managers' => User::where('type', 'Manager')->get()
        ]);
    }

    public function create(){
        $this->name = $this->phone = $this->password = $this->selected_model = null;
    }

    public function submit(){
        $this->validate([
            'name' => 'required',
            'phone' => 'required|unique:users,phone,'.($this->selected_model->id ?? null),
            'password' => 'nullable|string|min:4'
        ]);

        if($this->selected_model){
            $this->selected_model->update([
                'name' => $this->name,
                'phone' => $this->phone,
            ]);
            if($this->password){
                $this->selected_model->update([
                    'password' => bcrypt($this->password),
                ]);
            }
            $this->alert('success', 'Manager updated', [
                'position' => 'bottom-start'
            ]);
        }else{
            User::create([
                'name' => $this->name,
                'phone' => $this->phone,
                'password' => bcrypt($this->password ?? $this->phone),
                'type' => 'Manager'
            ]);
            $this->alert('success', 'Manager created', [
                'position' => 'bottom-start'
            ]);
        }

    }

    public function select_model(User $manager){
        $this->selected_model = $manager;
        $this->name = $manager->name;
        $this->phone = $manager->phone;
    }
}
