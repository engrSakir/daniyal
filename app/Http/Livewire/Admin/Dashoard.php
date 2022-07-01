<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Dashoard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashoard')
        ->extends('layouts.app', ['title' => 'Dashbboard'])
        ->section('content');
    }
}
