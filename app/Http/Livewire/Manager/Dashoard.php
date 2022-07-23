<?php

namespace App\Http\Livewire\Manager;

use App\Models\Category;
use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;

class Dashoard extends Component
{
    public function render()
    {
        return view('livewire.manager.dashoard',[
            'categories' => Category::all(),
            'today_delete_orders' =>  Order::withTrashed()->whereDate('deleted_at', Carbon::today())->count()
        ]);
    }
}
