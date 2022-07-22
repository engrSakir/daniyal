<div class="container-fluid">
    <style>
        .order_selection {
            height: 4in;
            overflow: auto;
        }
    </style>
    <div class="row">
        <div class="col-lg-7">
            <div class="card border border-primary">
                <div class="order_selection">
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
                <div class="order_selection">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Item</th>
                                <th scope="col"></th>
                                <th scope="col">QTY</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items_array as $item)
                            <tr>
                                <td>
                                    {{ $item['item_name'] }} @if($item['sub_category_name']) <sub>({{ $item['sub_category_name'] }})</sub> @endif
                                    {{-- <hr>
                                    <span class="badge badge-success shadow-success m-1">+</span>
                                    <span class="badge badge-success shadow-danger m-1">-</span> --}}
                                    {{-- <div class="btn-group m-1">
                                        <button type="button" class="btn btn-outline-danger waves-effect waves-light btn-sm"> <i class="fa fa fa-trash-o"></i> </button>
                                        <button type="button" class="btn btn-outline-success waves-effect waves-light btn-sm"> <i class="fa fa-music"></i> </button>
                                     </div> --}}
                                </td>
                                <td style="text-align:center;">
                                    <span class="btn waves-effect waves badge badge-success">+</span>
                                    <span class="btn waves-effect waves badge badge-warning">-</span>
                                    <span class="btn waves-effect waves badge badge-danger">~</span>
                                </td>
                                <td style="text-align:right;">
                                    {{ $item['item_price'] }}
                                </td>
                                <td style="text-align:right;">
                                    {{ $item['item_price'] }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <button type="button" class="btn btn-primary waves-effect waves-light m-1" wire:click="clear_items_array"><i class="fa fa-star"></i> Save </button>
                    <button type="button" class="btn btn-inverse-danger waves-effect waves-light m-1" wire:click="clear_items_array"><i class="fa fa-times"></i> Clear </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white"><i class="fa fa-star"></i>Waiter Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="submit">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">name</label>
                                <input type="text" class="form-control" wire:model="name" id="name">
                                <x-error name="name" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                            <button type="reset" class="btn btn-secondary"><i class="fa fa-refresh"></i>
                                Reset</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i>
                                Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End container-fluid-->