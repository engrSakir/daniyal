<!DOCTYPE html>
<html lang="en">

<head>
    <title> Invoice: {{ $order->serial_number }} </title>
    <style>
        @page {
            background-color: #ffffff;
            /* sheet-size: 70mm 180mm; */
            /* size: auto; */
            /* background-color: azure; */
            vertical-align: top;
            margin-top: 0;
            /* <any of the usual CSS values for margins> */
            margin-left: 1mm;
            /* <any of the usual CSS values for margins> */
            margin-right: 1mm;
            /* <any of the usual CSS values for margins> */
            margin-bottom: 0;
            /* <any of the usual CSS values for margins> */
            margin-header: 0;
            /* <any of the usual CSS values for margins> */
            margin-footer: 0;
            /* <any of the usual CSS values for margins> */
            marks: cross;
            /*crop | cross | none*/
            /*https://mpdf.github.io/css-stylesheets/supported-css.html*/
            /*https://mpdf.github.io/paging/different-page-sizes.html*/
        }

        #item-table tr:nth-child(even) {
            background-color: #f1f8ff;
        }

        .parcel {
            border-radius: 10px;
            border: 2px solid #00000066;
            padding: 5px;
            width: 222px;
            height: 60px;
        }

    </style>
</head>

<body>
    <table style="font-size: 10px; width:100%;">
        <tr>
            <td>
                Date: {{ $order->created_at->format('d.m.Y') }} 
            </td>
            <td style="text-align: right;">
                Time: {{ $order->created_at->format('h:i:s A') }}
            </td>
        </tr>
    </table>
    <table id="item-table" style="width: 100%; font-size: 10px; margin-bottom:5px;">
        <tr class="tabletitle">
            <td class="item" style="width: 5%">
                <h3>#</h3>
            </td>
            <td class="Rate" style="width: 60%; text-align:left;">
                <h3>Item</h3>
            </td>
            <td class="Rate" style="width: 10%; text-align:right;">
                <h3>QTY</h3>
            </td>
        </tr>
        @foreach ($order->order_items as $order_item)
        @php
        $item = $order_item->category_wise_item->item
        @endphp
        <tr class="item @if ($loop->last) last @endif">
            <td style="text-align:left;">{{ $loop->iteration }}</td>
            <td style="text-align:left;">{{ $item->name ?? '#' }}</td>
            <td style="text-align:right;"> {{ $order_item->quantity }} </td>
        </tr>
        @endforeach
    </table>
    <table style="margin-top: 4px; width:100%;">
        <tr>
            <td style="text-align: left; margin-top:10px; color:black; font-size:10px;">
                <b>#{{ $order->serial_number }}</b>
            </td>
            <td style="text-align: right; margin-top:10px; color:black; font-size:10px;">
                <b>Waiter:</b> {{ $order->waiter->name ?? 'N/A' }}, &nbsp; <b>Table:</b> {{ $order->table->name ?? 'N/A' }}
            </td>
        </tr>
    </table>
    @if ($order->is_parcel == true)
    <div class="parcel">
        <p style="font-size: 10px;">
            Phone: <b>{{ $order->customer_phone ?? 'N/A' }}</b> <br>
            Address: {{ $order->customer_address ?? 'N/A' }} <br>
        </p>
    </div>
    @endif
</body>

</html>
