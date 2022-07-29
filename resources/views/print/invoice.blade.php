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
    <div style="width: 100%; text-align:center;">
        <img src="{{ asset('assets/images/logo.png') }}" width="116" height="80" alt=""> <br>
        <p style="font-size: 10px; margin:0px 0px 5px 0px;">
            53, West Agargoan, Sher-e-Bangla Nagar, Dhaka-1207. (Near by Suleman Restaurant)
            <br> Cell : 01766-777459 , 01754-852774
            <br> daniyalfoodcafe@gmail.com , daniyalfood.com.bd
        </p>
        <h3 style="margin: 5px 0px 5px 0px;"> #{{ $order->serial_number }} </h3>
    </div>
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
            <td class="Rate" style="width: 15%; text-align:right;">
                <h3>Price</h3>
            </td>
            <td class="Rate" style="width: 10%; text-align:right;">
                <h3>QTY</h3>
            </td>
            <td class="Rate" style="width: 10%; text-align:right;">
                <h3>Total</h3>
            </td>
        </tr>
        @foreach ($order->order_items as $order_item)
        @php
        $item = $order_item->category_wise_item->item
        @endphp
        <tr class="item @if ($loop->last) last @endif">
            <td style="text-align:left;">{{ $loop->iteration }}</td>
            <td style="text-align:left;">{{ $item->name }} <sub>{{ $order_item->category_wise_item->sub_category_name() }}</sub> </td>
            <td style="text-align:right;"> {{ $order_item->selling_price }} </td>
            <td style="text-align:right;"> {{ $order_item->quantity }} </td>
            <td style="text-align:right;"> {{ round($order_item->selling_price * $order_item->quantity, 2) }} </td>
        </tr>
        @endforeach
    </table>
    <table style="font-size: 14px; width:100%;">
        <td style="text-align:left;">
            Total price
        </td>
        <td class="payment" style="text-align:right;">
            <b>{{ money_format_india($order->price()) }}</b>
        </td>
        </tr>
        {{-- <tr class="">
                        <td class="Rate">
                            <h3>Discount</h3>
                        </td>
                        <td class="payment" style="text-align:right;">
                            {{ $order->discount_amount }}
        </td>
        </tr>
        <tr class="">
            <td class="Rate">
                <h3> Discount price:</h3>
            </td>
            <td class="payment" style="text-align:right;">
                {{ $order->total_price_after_discount() }}
            </td>
        </tr>
        <tr class="">
            <td class="Rate">
                <h3> Paid amount:</h3>
            </td>
            <td class="payment" style="text-align:right;">
                {{ $order->paid_amount }}
            </td>
        </tr>
        <tr class="">
            <td class="Rate">
                <h3> Return amount:</h3>
            </td>
            <td class="payment" style="text-align:right;">
                {{ $order->paid_amount - $order->total_price_after_discount() }}
            </td>
        </tr> --}}
    </table>
    @if ($order->is_parcel == true)
    <div class="parcel" style="margin-top: 10px;">
        <p style="font-size: 10px;">
            Phone: <b>{{ $order->customer_phone ?? 'N/A' }}</b> <br>
            Address: {{ $order->customer_address ?? 'N/A' }} <br>
        </p>
    </div>
    @endif
    <div style="margin-top: 10px;">
        <p style="text-align: center; color:black;">
            HOME DELIVERY AVAILABLE
        </p>
        <p style="text-align: center; margin-top:10px; color:black; font-size:10px;">
            Developed by <b>Datatech BD Ltd. (01304734623)</b>
        </p>
    </div>
</body>

</html>
