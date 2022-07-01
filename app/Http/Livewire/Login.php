<?php

namespace App\Http\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    use LivewireAlert;

    public $phone, $password;

    public function render()
    {
        return view('livewire.login')
            ->extends('layouts.guest', ['title' => 'Login'])
            ->section('content');
    }

    public function login()
    {
        $this->validate([
            'phone' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt(['phone' => $this->phone, 'password' => $this->password, 'account_activation' => true])) {
            $this->alert('success', 'Successfully login');
            if(auth()->user()->admin()){
                return redirect()->route('admin.dashboard');
            }
            if(auth()->user()->manager()){
                return redirect()->route('manager.dashboard');
            }
            Auth::logout();
            $this->alert('success', 'Role not found');
        } else {
            $this->alert('error', 'Incorrect credential');
        }
    }
}
