<?php

namespace App\Http\Livewire\Widgets;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class Logout extends Component
{
    use LivewireAlert;
    
    public function render()
    {
        return view('livewire.widgets.logout');
    }

    public function logout(){
        Auth::logout();
        $this->alert('success', 'Successfully logout');
        return redirect()->route('login');
    }
}
