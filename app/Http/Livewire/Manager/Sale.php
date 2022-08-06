<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Sale extends Component
{
    use LivewireAlert, WithFileUploads;

    public function render()
    {
        return view('livewire.manager.sale');
    }
}
