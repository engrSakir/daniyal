<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Item Page</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="javaScript:void();">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Item Page</li>
            </ol>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-toggle="modal" data-target="#modal" wire:click="create"><i class="fa fa-plus mr-1"></i> Create </button>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb-->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-primary shadow-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white"><i class="fa fa-star"></i>Offer Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="submit">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="category_id">category</label>
                                <select class="form-control" wire:model="category_id" id="category_id">
                                    <option value="">Select</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <x-error name="category_id" />
                            </div>
                            @if($type == 'Item')
                            <div class="form-group col-md-6">
                                <label for="item_id">Item</label>
                                <select class="form-control" wire:model="item_id" id="item_id">
                                    <option value="">Select</option>
                                    @foreach ($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <x-error name="item_id" />
                            </div>
                            @elseif($type == 'Set Menu')
                            <div class="form-group col-md-6">
                                <label for="set_menu_id">Set Menu</label>
                                <select class="form-control" wire:model="set_menu_id" id="set_menu_id">
                                    <option value="">Select</option>
                                    @foreach ($set_menus as $set_menue)
                                    <option value="{{ $set_menue->id }}">{{ $set_menue->name }}</option>
                                    @endforeach
                                </select>
                                <x-error name="set_menu_id" />
                            </div>
                            @else
                            <div class="col-md-6"></div>
                            @endif
                            <div class="form-group col-md-6">
                                <label for="issue_date">Issue Date</label>
                                <input type="date" class="form-control" wire:model="issue_date" id="issue_date">
                                <x-error name="issue_date" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="expire_date">Expire Date</label>
                                <input type="date" class="form-control" wire:model="expire_date" id="expire_date">
                                <x-error name="expire_date" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">name</label>
                                <input type="text" class="form-control" wire:model="name" id="name">
                                <x-error name="name" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="image">image</label>
                                <input type="file" accept="image/*" class="form-control" wire:model="image" id="image">
                                <x-error name="image" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="discount_percentage">discount percentage</label>
                                <input type="number" class="form-control" wire:model="discount_percentage" id="discount_percentage">
                                <x-error name="discount_percentage" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="discount_fixed_amount">discount fixed amount</label>
                                <input type="number" class="form-control" wire:model="discount_fixed_amount" id="discount_fixed_amount">
                                <x-error name="discount_fixed_amount" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="buy_qty">If Buy (QTY)</label>
                                <input type="number" class="form-control" wire:model="buy_qty" id="buy_qty">
                                <x-error name="buy_qty" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="get_qty">Than Free Get (QTY)</label>
                                <input type="number" class="form-control" wire:model="get_qty" id="get_qty">
                                <x-error name="get_qty" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="offline_active">offline active</label>
                                <select class="form-control" wire:model="offline_active" id="offline_active">
                                    <option value="">Select</option>
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                                <x-error name="offline_active" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="online_active">online active</label>
                                <select class="form-control" wire:model="online_active" id="online_active">
                                    <option value="">Select</option>
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                                <x-error name="online_active" />
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
