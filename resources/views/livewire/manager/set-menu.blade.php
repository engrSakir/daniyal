<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Set Menu Page</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="javaScript:void();">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Set Menu Page</li>
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
                                    <th scope="col">Set Menu</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Online Status</th>
                                    <th scope="col">Offline Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($set_menues as $set_menu)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <img src="{{ asset($set_menu->image ? $set_menu->image : 'assets/images/no-image.png') }}" width="50px">
                                        {{ $set_menu->name }}
                                    </td>
                                    <td>{{ $set_menu->price }}</td>
                                    <td>
                                        @if ($set_menu->online_active)
                                        <span class="badge badge-pill badge-success m-1">Active</span>
                                        @else
                                        <span class="badge badge-pill badge-danger m-1">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($set_menu->offline_active)
                                        <span class="badge badge-pill badge-success m-1">Active</span>
                                        @else
                                        <span class="badge badge-pill badge-danger m-1">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group m-1">
                                            <button type="button" class="btn btn-warning waves-effect waves-light" data-toggle="modal" data-target="#modal" wire:click="select_model({{ $set_menu }})"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light"><i class="fa fa fa-trash-o"></i></button>
                                        </div>
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
    <!-- Modal -->
    <div class="modal fade" id="modal" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white"><i class="fa fa-star"></i> Set Menu Form</h5>
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
                                    <option>Select</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <x-error name="category_id" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="offline_active">offline active</label>
                                <select class="form-control" wire:model="offline_active" id="offline_active" required>
                                    <option value="">Select</option>
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                                <x-error name="offline_active" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="online_active">online active</label>
                                <select class="form-control" wire:model="online_active" id="online_active" required>
                                    <option value="">Select</option>
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                                <x-error name="online_active" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="slug">slug</label>
                                <input type="text" class="form-control" wire:model="slug" id="slug" required>
                                <x-error name="slug" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name">name</label>
                                <input type="text" class="form-control" wire:model="name" id="name" required>
                                <x-error name="name" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="banglish_name">banglish name</label>
                                <input type="text" class="form-control" wire:model="banglish_name" id="banglish_name" required>
                                <x-error name="banglish_name" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="shortcut_number">shortcut number</label>
                                <input type="number" class="form-control" wire:model="shortcut_number" id="shortcut_number" required>
                                <x-error name="shortcut_number" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="price">price</label>
                                <input type="number" class="form-control" wire:model="price" id="price" required>
                                <x-error name="price" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="image">image</label>
                                <input type="file" accept="image/*" class="form-control" wire:model="image" id="image">
                                <x-error name="image" />
                            </div>
                            @foreach ($items_array as $key => $item_array)
                            <div class="form-group col-md-12 row">
                                <div class="col-md-5">
                                    <label for="items_array.{{ $key }}.item_id">select item</label>
                                    <select class="form-control" wire:model="items_array.{{ $key }}.item_id" id="items_array.{{ $key }}.item_id" required>
                                        <option value="">Select</option>
                                        @foreach ($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-error name="items_array.{{ $key }}.item_id" />
                                </div>
                                <div class="col-md-5">
                                    <label for="items_array.{{ $key }}.item_quantity">quantity</label>
                                    <input type="number" class="form-control" wire:model="items_array.{{ $key }}.item_quantity" id="items_array.{{ $key }}.item_quantity" required>
                                    <x-error name="items_array.{{ $key }}.item_quantity" />
                                </div>
                                <div class="col-md-2">
                                        <button type="button" class="btn btn-danger waves-effect waves-light mt-4" wire:click="add_or_remove_items({{ $key }})"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            @endforeach
                            <button type="button" class="btn btn-success waves-effect waves-light col-6 m-5" wire:click="add_or_remove_items"><i class="fa fa fa-plus"></i> Add Item </button>

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
