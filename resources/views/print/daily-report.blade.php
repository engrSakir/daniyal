@extends('layouts.pdf')
@section('content')



<style>
    * {
        box-sizing: border-box;
    }

    .row {
        margin-left: -5px;
        margin-right: -5px;
    }

    .invoice {
        float: left;
        width: auto;
        padding: 5px;
    }

    .expense {
        float: left;
        width: auto;
        padding: 5px;
    }

    .buy {
        float: right;
        width: auto;
        padding: 5px;
    }

    /* Clearfix (clear floats) */
    .row::after {
        content: "";
        clear: both;
        display: table;
    }

    #data table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }

    #data th,
    #data td {
        text-align: left;
        padding: 16px;
    }

    #data tr:nth-child(even) {
        background-color: #f2f2f2;
    }

</style>

<div id="data" class="row">
    <div class="invoice">
        <table>
            <tr>
                <th>S/L</th>
                <th>INVOICE NO</th>
                <th>TABLE/PARCEL/GROUP</th>
                <th>SALE</th>
                <th>DISCOUNT</th>
            </tr>
            @foreach ($orders as $order)
            <tr>
                <th style="text-align:right;">{{ $loop->iteration }}</th>
                <td style="text-align:right;">{{ $order->serial_number }}</td>
                <td style="text-align: center;">
                    @if($order->is_parcel)
                    P
                    @else
                    {{ $order->table->name ?? '' }}
                    @endif
                </td>
                <td style="text-align: right;">{{ number_format($order->paid_amount) }} &nbsp;</td>
                <td style="text-align: right;">{{ number_format($order->discount_amount()) }} &nbsp;</td>
            </tr>
            @endforeach
            <tr>
                <th>S/L</th>
                <th>INVOICE NO</th>
                <th>TABLE/PARCEL/GROUP</th>
                <th>SALE</th>
                <th>DISCOUNT</th>
            </tr>
        </table>
    </div>
    <div class="expense">
        <table>
            <tr>
                <th>Expense</th>
            </tr>
            @foreach ($expeses as $expese)
            <tr>
                <td style="text-align: right;">{{ number_format($expese->amount) }} &nbsp;</td>
            </tr>
            @endforeach
            <tr>
                <th>Expense</th>
            </tr>
        </table>
    </div>
    <div class="buy">
        <table>
            <tr>
                <th>Buy</th>
            </tr>
            @foreach ($purchases as $purchase)
            <tr>
                <td style="text-align: right;">{{ number_format($purchase->amount) }} &nbsp;</td>
            </tr>
            @endforeach
            <tr>
                <th>Buy</th>
            </tr>
        </table>
    </div>
</div>





{{-- <table style="width: 10%;" class="table" cellpading="0" cellspacing="0">
    <thead>
        <tr>
            <th style="text-align:right;">Expense</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($expeses as $expese)
        <tr>
            <td style="text-align: right;">{{ number_format($expese->amount) }} &nbsp;</td>
</tr>
@endforeach
</tbody>
</table> --}}



@endsection
