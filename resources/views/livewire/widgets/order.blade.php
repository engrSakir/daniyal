<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Waiter/Table</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">
                                            {{ $order->serial_number }} <br>
                                            @if ($order->status != 'Complete')
                                                <small>{{ $order->created_at->diffForHumans() }}</small>
                                            @endif
                                        </th>
                                        <td>
                                            @if ($order->waiter->name ?? false)
                                                <span class="badge badge-info">Waiter:
                                                    {{ $order->waiter->name ?? '' }}</span>
                                            @endif
                                            @if ($order->is_parcel)
                                                <img src="{{ asset('assets/images/deliveryman.png') }}" alt=""
                                                    style="width:30px;">
                                            @else
                                                @if ($order->table->name ?? false)
                                                    <span class="badge badge-info">Table:
                                                        {{ $order->table->name ?? '' }}</span>
                                                @endif
                                            @endif
                                            <br> <span
                                                class="badge @if ($order->is_due()) badge-danger @else badge-success @endif mt-2"
                                                style="font-size:20px;">Bill:
                                                {{ money_format_india($order->price_after_discount()) }}</span>
                                        </td>
                                        <td class="text-center">
                                            @if ($order->is_online && $order->status == 'Pending')
                                                <img src="{{ asset('assets/images/gif/online-order-pending.gif') }}"
                                                    alt="" width="40px;">
                                            @elseif($order->status == 'Reject')
                                                <img src="{{ asset('assets/images/gif/reject.svg') }}" alt=""
                                                    width="40px;">
                                            @elseif($order->status == 'Cook')
                                                <img src="{{ asset('assets/images/gif/cook.gif') }}" alt=""
                                                    width="40px;">
                                            @elseif($order->status == 'Serve')
                                                <img src="{{ asset('assets/images/gif/eat.gif') }}" alt=""
                                                    width="30px;">
                                            @elseif($order->status == 'Complete')
                                                <img src="{{ asset('assets/images/complete.png') }}" alt=""
                                                    width="60px;">
                                            @endif
                                            @if ($order->status != 'Complete')
                                                <select class="form-control form-control-sm"
                                                    wire:change="change_status({{ $order->id }}, $event.target.value)">
                                                    <option value="Pending"
                                                        @if ($order->status == 'Pending') selected @endif> Pending
                                                    </option>
                                                    <option value="Reject"
                                                        @if ($order->status == 'Reject') selected @endif> Reject
                                                    </option>
                                                    <option value="Cook"
                                                        @if ($order->status == 'Cook') selected @endif> Cook
                                                    </option>
                                                    <option value="Serve"
                                                        @if ($order->status == 'Serve') selected @endif> Serve
                                                    </option>
                                                    <option value="Complete"
                                                        @if ($order->status == 'Complete') selected @endif> Complete
                                                    </option>
                                                </select>
                                            @endif
                                        </td>
                                        <th class="text-right">
                                            <div class="btn-group m-1">
                                                <a href="{{ route('manager.invoice', $order) }}"
                                                    class="btn btn-outline-primary waves-effect waves-light"
                                                    target="_blank"> <i class="zmdi zmdi-print"></i> </a>
                                                {{-- <button type="button" class="btn btn-outline-warning waves-effect waves-light" wire:click="print({{ $order->id }})"> <i class="zmdi zmdi-print"></i> </button> --}}

                                                <button type="button"
                                                    @if ($order->status == 'Complete') disabled @endif
                                                    class="btn btn-outline-danger waves-effect waves-light"
                                                    wire:click="edit({{ $order->id }})"> <i
                                                        class="zmdi zmdi-edit"></i> </button>

                                                <button type="button"
                                                    class="btn btn-outline-danger waves-effect waves-light"
                                                    wire:click="delete({{ $order->id }})"
                                                    onclick="confirm('Are you sure you want to remove ?') || event.stopImmediatePropagation()">
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
</div>
