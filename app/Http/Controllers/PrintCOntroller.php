<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PrintCOntroller extends Controller
{
    public function invoice(Order $order)
    {
        $pdf = PDF::loadView('print.invoice', compact('order'));
        return $pdf->stream('Invoice-' . $order->serial_number . ' Date time-' . date('d-m-Y- h-i-s') . '.pdf');
    }
}
