<div class="container-fluid">
    <style>
        .item_box {
            height: 450px;
            overflow: auto;
        }

        .card_box {
            height: 300px;
            overflow: auto;
        }

        .form-group {
            margin-bottom: 0rem;
        }

    </style>
    <div class="row">
        <div class="col-lg-7">
            <div class="card border border-primary">
                <div class="item_box">
                    <select class="form-control" wire:model="category_id">
                        <option value="-1">Select Category</option>
                        @foreach ($caregories as $category_option)
                        <option value="{{ $category_option->id }}">{{ $category_option->name }}</option>
                        @endforeach
                    </select>
                    <p class="text-danger" wire:loading wire:target="category_id">
                        Updating Items -----
                    </p>
                    @if($category)
                    <table class="table table-bordered table-sm">
                        <thead class="">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Items</th>
                                @if($category->has_sub_category)
                                @foreach ($category->sub_categories as $sub_category)
                                <th scope="colr" style="text-align: center;">{{ $sub_category->name }}</th>
                                @endforeach
                                @else
                                <th scope="colr" style="text-align: center;">Price</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category->category_wise_items()->get()->unique('item_id') as $category_wise_item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    {{ $category_wise_item->item->name }}
                                    @if($category->has_sub_item)
                                    <small>
                                        <ol>
                                            @foreach ($category_wise_item->item->sub_items as $sub_tem)
                                            <li>{{ $sub_tem->name }}</li>
                                            @endforeach
                                        </ol>
                                    </small>
                                    @endif
                                </td>
                                @if($category->has_sub_category)
                                @foreach ($category->sub_categories as $sub_category)
                                <td style="text-align: center;">
                                    <button wire:click="item_add_or_remove({{ $category_wise_item->item_id }}, {{ $category_wise_item->category_id }}, {{ $sub_category->id }})" type="button" class="btn @if(collect($items_array)->where('item_id', $category_wise_item->item_id)->where('category_id', $category_wise_item->category_id)->where('sub_category_id', $sub_category->id)->count()>0) bg-success text-white @else btn-inverse-secondary @endif btn-round waves-effect waves-light">
                                        {{ price_helper($category_wise_item->item_id, $category_wise_item->category_id, $sub_category->id) }}
                                    </button>
                                </td>
                                @endforeach
                                @else
                                <td style="text-align: center;">
                                    <button wire:click="item_add_or_remove({{ $category_wise_item->item_id }}, {{ $category_wise_item->category_id }}, {{ null }})" type="button" class="btn @if(collect($items_array)->where('item_id', $category_wise_item->item_id)->where('category_id', $category_wise_item->category_id)->where('sub_category_id', null)->count()>0) bg-success text-white @else btn-inverse-secondary @endif btn-round waves-effect waves-light">
                                        {{ $category_wise_item->price }}
                                    </button>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="alert alert-outline-warning alert-dismissible mt-3" role="alert">
                        <div class="alert-icon">
                            <i class="icon-exclamation"></i>
                        </div>
                        <div class="alert-message">
                            <span><strong>Hey!</strong> Please select a category</span>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card border border-primary">
                    <form class="mb-2">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control form-control-square form-control-sm" placeholder="Phone" wire:model="phone">
                            </div>
                            <div class="form-group col-md-6">
                                @if($parcel)
                                <input type="text" class="form-control form-control-square form-control-sm" placeholder="Address" wire:model="address">
                                @endif
                            </div>
                            <div class="form-group col-md-1">
                                <input type="checkbox" id="parcel" class="filled-in chk-col-success" wire:model="parcel" value="1">
                                <label for="parcel"></label>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="waiter" class="sr-only">Waiter</label>
                                <select class="form-control form-control-square form-control-sm" id="waiter" wire:model="waiter">
                                    <option value="">Select Waiter</option>
                                    @foreach ($waiters as $waiter)
                                    <option value="{{ $waiter->id }}">{{ $waiter->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                @if(!$parcel)
                                <label for="table" class="sr-only">Table</label>
                                <select class="form-control form-control-square form-control-sm" id="table" wire:model="table">
                                    <option value="">Select Tale</option>
                                    @foreach ($tables as $table)
                                    <option value="{{ $table->id }}">{{ $table->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <input type="number" class="form-control form-control-square text-right form-control-sm" wire:model="receive_amount" placeholder="Receive">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="number" class="form-control form-control-square bg-success text-white text-right form-control-sm" readonly wire:model="total_bill" placeholder="Bill">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="number" class="form-control form-control-square text-right form-control-sm" wire:model="return_amount" readonly placeholder="Return">
                            </div>
                        </div>
                    </form>
                <div class="card_box">
                    <table class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Item</th>
                                <th scope="col">Action</th>
                                <th scope="col">QTY</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items_array as $array_key => $item)
                            <tr>
                                <td>
                                    {{ $item['item_name'] }} @if($item['sub_category_name']) <sub>({{ $item['sub_category_name'] }})</sub> @endif
                                </td>
                                <td style="text-align:center;">
                                    <div class="d-inline">
                                        <span class="btn waves-effect waves badge badge-success" wire:click="increase_qty({{ $array_key }})">+</span>
                                        <span class="btn waves-effect waves badge badge-warning" wire:click="decrease_qty({{ $array_key }})">-</span>
                                        <span class="btn waves-effect waves badge badge-danger" wire:click="remove_item({{ $array_key }})">~</span>
                                    </div>
                                </td>
                                <td style="text-align:right;">
                                    {{ $item['item_qty'] }}
                                </td>
                                <td style="text-align:right;">
                                    {{ $item['item_single_price'] }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary waves-effect waves-light m-1" wire:click="save_order"><i class="fa fa-star"></i> Save </button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-inverse-danger waves-effect waves-light m-1" wire:click="clear_items_array"><i class="fa fa-times"></i> Clear </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Order List</h5>
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
                        <th scope="row">{{ $order->serial_number }}</th>
                        <td>
                            {{ $order->waiter->name ?? 'N/A' }} / @if($order->is_parcel) Parcel @else {{ $order->table->name ?? 'N/A' }} @endif 
                            <br> <span class="badge badge-success mt-2" style="font-size:20px;">{{ $order->price() }}2800</span>
                        </td>
                        <td class="text-center">
                            @if($order->is_online && $order->status == 'Pending')
                            <img src="{{ asset('assets/images/gif/online-order-pending.gif') }}" alt="" width="40px;">
                            @elseif($order->status == 'Reject')
                            <img src="{{ asset('assets/images/gif/reject.svg') }}" alt="" width="40px;">
                            @elseif($order->status == 'Cook')
                            <img src="{{ asset('assets/images/gif/cook.gif') }}" alt="" width="40px;">
                            @elseif($order->status == 'Serve')
                            <img src="{{ asset('assets/images/gif/eat.gif') }}" alt="" width="30px;">
                            @elseif($order->status == 'Complete')
                            <img src="{{ asset('assets/images/complete.png') }}" alt="" width="60px;">
                            @endif
                            @if($order->status != 'Complete')
                            <select class="form-control form-control-sm" wire:change="change_status({{ $order->id }}, $event.target.value)">
                                <option value="Penging" @if($order->status == 'Penging') selected @endif> Penging </option>
                                <option value="Reject" @if($order->status == 'Reject') selected @endif> Reject </option>
                                <option value="Cook" @if($order->status == 'Cook') selected @endif> Cook </option>
                                <option value="Serve" @if($order->status == 'Serve') selected @endif> Serve </option>
                                <option value="Complete" @if($order->status == 'Complete') selected @endif> Complete </option>
                            </select>
                            @endif
                        </td>
                        <th class="text-right">
                            <div class="btn-group m-1">
                                <a href="{{ route('manager.invoice', $order) }}" class="btn btn-outline-primary waves-effect waves-light" target="_blank"> <i class="zmdi zmdi-print"></i> </a>
                                <button type="button" class="btn btn-outline-warning waves-effect waves-light" wire:click="print({{ $order->id }})"> <i class="zmdi zmdi-print"></i> </button>
                                <button type="button" class="btn btn-outline-primary waves-effect waves-light"> <i class="zmdi zmdi-edit"></i> </button>
                                <button type="button" class="btn btn-outline-danger waves-effect waves-light"> <i class="fa fa fa-trash-o"></i> </button>
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

      <script src="{{ asset('assets/printjs/print.min.js') }}"></script>
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/printjs/print.min.css') }}">

</div>
<!-- End container-fluid-->
