<?php

namespace App\Http\Livewire\Manager;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class Report extends Component
{
    public $date_for_daily_report;

    public function render()
    {
        return view('livewire.manager.report');
    }
}
