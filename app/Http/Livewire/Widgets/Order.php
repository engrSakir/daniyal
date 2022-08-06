<?php

namespace App\Http\Livewire\Widgets;

use App\Models\Order as ModelsOrder;
use Carbon\Carbon;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Order extends Component
{
    use LivewireAlert, WithFileUploads;

    protected $listeners = ['updateOrder' => 'render'];

    public function render()
    {
        return view('livewire.widgets.order',[
            'orders' => ModelsOrder::whereDate('created_at', Carbon::today())->latest()->get(),
        ]);
    }

    public function change_status(ModelsOrder $order, $status)
    {
        $order->update(['status' => $status]);
        $this->alert('success', 'Status Update', [
            'position' => 'bottom-start'
        ]);
    }

    public function delete(ModelsOrder $order)
    {
        $order->delete();
        $this->alert('success', 'Successfully deleted', [
            'position' => 'bottom-start'
        ]);
    }

}
