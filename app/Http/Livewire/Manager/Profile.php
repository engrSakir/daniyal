<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class Profile extends Component
{
    use LivewireAlert;
    
    public $old_password;
    public $new_password;
    public $confirm_password;

    public function render()
    {
        return view('livewire.manager.profile');
    }

    public function change_password()
    {
        $this->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:4',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($this->old_password) {
            if (Hash::check($this->old_password, $this->user->password)) {
                auth()->user->update(['password' => Hash::make($this->new_password)]);
                $this->old_password = $this->new_password = $this->confirm_password = null;
                $this->alert('success', 'Password successfully changed', [
                    'position' => 'bottom-start'
                ]);
            } else {
                $this->alert('error', 'Old password is not correct', [
                    'position' => 'center'
                ]);
            }
        }
    }
}
