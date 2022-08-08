@extends('layouts.pdf')
@section('content')
** Sales Report **
<table style="width: 100%;" class="table" cellpading="0" cellspacing="0">
    <thead>
        <tr>
            <th style="text-align:left;">SL</th>
            <th style="text-align:left;">Items #QTY #Price</th>
            <th style="text-align: right;">Paid</th>
            <th style="text-align: right;">Due</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <th style="text-align:left;">
                #{{ $order->serial_number }}
                <br> <br>
                @if($order->status == 'Complete')
                <img src="{{ asset('assets/images/complete.png') }}" alt="" width="20px;">
                @if($order->price() - $order->paid_amount > 0)
                <img src="{{ asset('assets/images/taka-red.png') }}" alt="" width="20px;">
                @endif
                @else
                {{ $order->status }}
                @endif
            </th>
            <td style="text-align:left;">
                <ol>
                    @foreach ($order->order_items as $order_item)
                    <li>
                        {{ $order_item->category_wise_item->item->name ?? 'N/A' }} <sub>{{ $order_item->category_wise_item->sub_category_name() }} </sub> <b>#</b>{{ $order_item->quantity }} <b>#</b>{{ $order_item->selling_price }}
                    </li>
                    @endforeach
                </ol>
            </td>
            <td style="text-align: right;">{{ number_format($order->paid_amount) }} &nbsp;</td>
            <td style="text-align: right;">{{ number_format($order->price() - $order->paid_amount) }} &nbsp;</td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
<hr>
** Expense Report **
<table style="width: 100%;" class="table" cellpading="0" cellspacing="0">
    <thead>
        <tr>
            <th style="text-align:left;">SL</th>
            <th style="text-align:left;">Category</th>
            <th style="text-align: right;">Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($expenses->groupBy('category_id') as $expense_group => $expense)
        @dd($expense);
        <tr>
            <th style="text-align:left;">
                #{{ $loop->iteration }}
            </th>
            <td style="text-align:left;">
                Category
            </td>
            <td style="text-align: right;">{{ number_format($order->paid_amount) }} &nbsp;</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
