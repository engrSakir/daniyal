<div class="noselect">
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
    <div wire:ignore.self class="modal fade modal-fullscreen" id="online_order_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <select class="form-control form-control-sm" wire:model="category">
                                <option value="">All item</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <div class="row" style="height: 440px; overflow: auto;">
                                @foreach ($category_wise_items as $category_wise_item)
                                <div class="col-md-4" wire:click="addToCard({{ $category_wise_item->id }})">
                                    <div class="m-1 card pointer btn-outline-success">
                                        <div class="p-3">
                                            {{ $category_wise_item->item->name ?? '' }}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4 card">
                            <h1 class="text-center">{{ $total }} TK</h1>
                            <div style="height: 440px; overflow: auto;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <select class="custom-select custom-select-sm" wire:model="waiter">
                                                    <option value="">Select Waiter</option>
                                                    @foreach ($waiters as $waiter)
                                                    <option value="{{ $waiter->id }}">{{ $waiter->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-phone-square"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Phone Number" wire:model="phone">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="zmdi zmdi-account"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Customer Name" wire:model="name">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="zmdi zmdi-pin-drop"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Delivery Address" wire:model="address">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-percent"></i>
                                                        </div>
                                                    </div>
                                                    <input type="number" class="form-control form-control-sm calculation" placeholder="%" title="Discount Percentage" wire:model="discount_percentage">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-asterisk"></i>
                                                        </div>
                                                    </div>
                                                    <input type="number" class="form-control form-control-sm calculation" placeholder="Fixed" title="Discount Fixed Amount" wire:model="discount_fixed_amount">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="zmdi zmdi-directions-bike"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control form-control-sm calculation" placeholder="Delivery Charge" wire:model="delivery_charge">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group mt-2 w-100">
                                    <button type="button" class="btn btn-outline-success waves-effect waves-light btn-sm w-50">Save & Cook</button>
                                    <button type="button" class="btn btn-outline-danger waves-danger waves-light btn-sm w-50">Reject</button>
                                </div>
                                <table class="table table-striped table-hover mt-1 table-sm">
                                    <thead class="bg-info text-white">
                                        <tr>
                                            <td>#</td>
                                            <td>Name</td>
                                            <td style="text-align: right;">Price</td>
                                            <td style="text-align: center;">QT</td>
                                            <td style="text-align: right;">Total</td>
                                            <td style="text-align: right; min-width:70px;">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                        <tr class="">
                                            <td>{{ $loop->iteration }}</td>
                                            <td style="font-size:12px;">{{ $item->name }}<sub>{{ $item->sub_category_name }}</sub></td>
                                            <td style="text-align: right;" class="">{{ $item->price }}</td>
                                            <td style="text-align: right;">
                                                <input type="number" style="width: 50px;" class="form-control form-control-sm" minimum="1" readonly value="{{ $item->quantity }}">
                                            </td>
                                            <td style="text-align: right;" class="">{{ round($item->getPriceSum(), 0) }}</td>
                                            <td style="text-align: right;">
                                                <i class="fa fa-plus-square fa-lg text-success hoverable" wire:click="updateQuantity({{ $item->id }}, '+')"></i>
                                                <i class="fa fa-minus-square fa-lg text-warning hoverable" wire:click="updateQuantity({{ $item->id }}, '-')"></i>
                                                <i class="fa fa-trash fa-lg text-danger hoverable" wire:click="remove_item({{ $item->id }})"></i>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
