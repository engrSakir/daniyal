<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PrintCOntroller extends Controller
{
    public function invoice(Order $order)
    {
        $blade_file = 'print.kitchen';
        if($order->status == 'Complete'){
            $blade_file = 'print.invoice';
        }
        $pdf = PDF::loadView($blade_file, compact('order'))->setPaper([0,0,567.00,183.80], 'landscape');
        return $pdf->stream('Invoice-' . $order->serial_number . ' Date time-' . date('d-m-Y- h-i-s') . '.pdf');

        // $pdf = PDF::loadView($blade_file, compact('order'));
        // $pdf->setPaper([0,0,$pdf->getPaperSize()[2],183.80], 'landscape');
        // return $pdf->stream('Invoice-' . $order->serial_number . ' Date time-' . date('d-m-Y- h-i-s') . '.pdf');
    }
}
