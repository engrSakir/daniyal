<?php

namespace App\Http\Livewire\Manager;

use App\Models\Category;
use App\Models\Expense;
use App\Models\Order;
use App\Models\Purchase;
use Carbon\Carbon;
use Livewire\Component;

class Dashoard extends Component
{
    public function mount(){
        $today_orders = Order::withTrashed()->whereDate('created_at', Carbon::today())->get();
        $this->today_delete_orders = $today_orders->where('deleted_at', '!=', null)->count();
        $this->today_total_income = $today_orders->where('status', 'Complete')->sum('paid_amount');
    }
    public function render()
    {
        return view('livewire.manager.dashoard',[
            'today_total_sale' => Order::where(''),
            'categories' => Category::all(),
            'today_total_expense' => Expense::whereDate('created_at', Carbon::today())->sum('amount'),
            'today_total_purchase' => Purchase::whereDate('created_at', Carbon::today())->sum('amount'),
        ]);
    }
}
