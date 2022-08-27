<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#Invoice</th>
                                    <th scope="col">Waiter/Table</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">
                                        <a href="{{ route('manager.invoice', $order) }}" target="_blank"> {{ $order->serial_number }} </a>
                                        <br>
                                        @if ($order->status != 'Complete')
                                        <small>{{ $order->created_at->diffForHumans() }}</small>
                                        @endif
                                    </th>
                                    <td>
                                        @if ($order->waiter->name ?? false)
                                        <span class="badge badge-info">Waiter: {{ $order->waiter->name ?? '' }}</span>
                                        @endif
                                        @if ($order->is_parcel)
                                        <img src="{{ asset('assets/images/deliveryman.png') }}" alt="" style="width:30px;">
                                        @else
                                        <span class="badge badge-info">Table: {{ $order->table->name ?? '' }}</span>
                                        @endif
                                        <br> <span class="badge @if ($order->is_due()) badge-danger @else badge-success @endif mt-2" style="font-size:20px;">Bill:
                                            {{ money_format_india($order->payable_amount) }}</span>
                                    </td>
                                    <td class="text-center">
                                        @if ($order->is_online && $order->status == 'Pending')
                                        <img src="{{ asset('assets/images/gif/notification-icon.gif') }}" alt="" width="40px;">
                                        <button type="button" class="btn btn-sm btn-success" wire:click="select_online_order({{ $order->id }})" data-toggle="modal" data-target="#online_order_modal">show</button>
                                        @elseif($order->status == 'Reject')
                                        <img src="{{ asset('assets/images/gif/reject.svg') }}" alt="" width="40px;">
                                        @elseif($order->status == 'Cook')
                                        <img src="{{ asset('assets/images/gif/cook.gif') }}" alt="" width="40px;">
                                        @elseif($order->status == 'Serve')
                                        <img src="{{ asset('assets/images/gif/eat.gif') }}" alt="" width="30px;">
                                        @elseif($order->status == 'Complete')
                                        <img src="{{ asset('assets/images/complete.png') }}" alt="" width="60px;">
                                        @endif
                                        @if ($order->status != 'Complete')
                                        <br>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn @if ($order->status == 'Reject') btn-success @else btn-secondary @endif btn-sm" wire:click="change_status({{ $order->id }}, 'Reject')">Reject</button>
                                            <button type="button" class="btn @if ($order->status == 'Cook') btn-success @else btn-secondary @endif btn-sm" wire:click="change_status({{ $order->id }}, 'Cook')">Cook</button>
                                            <button type="button" class="btn @if ($order->status == 'Serve') btn-success @else btn-secondary @endif btn-sm" wire:click="change_status({{ $order->id }}, 'Serve')">Serve</button>
                                            <button type="button" class="btn @if ($order->status == 'Complete') btn-success @else btn-secondary @endif btn-sm" wire:click="change_status({{ $order->id }}, 'Complete')">Complete</button>
                                        </div>
                                        @endif
                                    </td>
                                    <th class="text-right">
                                        <div class="btn-group m-1">
                                            <button type="button" onclick="printJS(`{{ route('manager.invoice', $order) }}`)" class="btn btn-outline-primary waves-effect waves-light"> <i class="zmdi zmdi-print"></i> </button>
                                            {{-- <button type="button" class="btn btn-outline-warning waves-effect waves-light" wire:click="print({{ $order->id }})"> <i class="zmdi zmdi-print"></i> </button> --}}

                                            {{-- <button type="button"
                                                    @if ($order->status == 'Complete') disabled @endif
                                                    class="btn btn-outline-danger waves-effect waves-light"
                                                    wire:click="edit({{ $order->id }})"> <i class="zmdi zmdi-edit"></i> </button> --}}

                                            <button type="button" class="btn btn-outline-danger waves-effect waves-light" wire:click="delete({{ $order->id }})" onclick="confirm('Are you sure you want to remove ?') || event.stopImmediatePropagation()">
                                                <i class="fa fa fa-trash-o"></i> </button>
                                        </div>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- selected_online_orderModal -->
    <div wire:ignore.self class="modal fade" id="online_order_modal" tabindex="-1" role="dialog" aria-labelledby="online_order_modal_title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="online_order_modal_title">Online Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if($selected_online_order)
                    Name: {{ $selected_online_order->customer_name }} <br>
                    Phone: <b>{{ $selected_online_order->customer_phone }}</b> <br>
                    Address: {{ $selected_online_order->customer_address }} <br>
                    <br>
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Item</th>
                            <th>QTY & Price</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($order->order_items as $order_item)
                        @php
                        $item = $order_item->category_wise_item->item
                        @endphp
                        <tr class="item @if ($loop->last) last @endif">
                            <td style="text-align:left;">{{ $loop->iteration }}</td>
                            <td style="text-align:left;">{{ $item->name }} <sub>{{ $order_item->category_wise_item->sub_category_name() }}</sub> </td>
                            <td style="text-align:right;"> 
                                Price: {{ $order_item->selling_price }} <br>
                                QTY: {{ $order_item->quantity }} <br>
                                Total: {{ round($order_item->selling_price * $order_item->quantity, 0) }} 
                            </td>
                            <td>
                                <button class="btn btn-sm btn-danger">D</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>


                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher("{{ config('broadcasting.connections.pusher.key') }}", {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('website');
        channel.bind('order', function(data) {
            alert(JSON.stringify(data));
        });

    </script>
</div>
