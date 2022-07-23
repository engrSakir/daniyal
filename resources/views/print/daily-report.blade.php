@extends('layouts.pdf')
@section('content')
<h5># {{ $date }} </h5>
<table style="width: 100%;" class="table" cellpading="0" cellspacing="0">

    <thead>
        <tr>
            <th>SL</th>
            <th>Paid</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $loop->iteration }}</td>
            
            <td>{{ number_format($order->paid_amount) }}</td>
        </tr>
        @endforeach
    </tbody>

</table>
@endsection

