<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;

class POS extends Component
{
    public function render()
    {
        return view('livewire.manager.p-o-s')
        ->extends('layouts.pos', ['title' => 'POS'])
        ->section('content');
    }
}
