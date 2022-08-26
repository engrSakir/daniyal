<?php

namespace App\Http\Livewire\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class MyAccount extends Component
{
    public $email_address, $password;

    public function login(){
        $this->validate([
            'email_address' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $this->email_address, 'password' => $this->password, 'status' => true])) {
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully login']);
            return redirect()->intended('dashboard');
        } else {
            Session::flash('message', 'Incorrect credential !');
            Session::flash('alert-class', 'alert-danger text-danger text-center fw-bold');
            $this->dispatchBrowserEvent('alert', ['type' => 'error',  'message' => 'Incorrect credential']);
        }
    }

    public function render()
    {
        return view('livewire.widgets.my-account');
    }
}
