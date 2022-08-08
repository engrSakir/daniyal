<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Category Page</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="javaScript:void();">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category Page</li>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Online Status</th>
                                    <th scope="col">Offline Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        @if($category->image)
                                        <img src="assets/images/gallery/1.jpg" class="card-img-top" style="width:20px;">
                                        @elseif($category->has_sub_category)
                                        <img src="{{ asset('assets/images/category.png') }}" class="card-img-top" style="width:20px;">
                                        @else
                                        <img src="{{ asset('assets/images/items.jpg') }}" class="card-img-top" style="width:20px;">
                                        @endif                                        
                                        <a href="{{ route('manager.category_details', $category) }}">{{ $category->name }}</a>
                                    </td>
                                    <td>
                                        @if ($category->online_active)
                                        <span class="badge badge-pill badge-success m-1">Active</span>
                                        @else
                                        <span class="badge badge-pill badge-danger m-1">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($category->offline_active)
                                        <span class="badge badge-pill badge-success m-1">Active</span>
                                        @else
                                        <span class="badge badge-pill badge-danger m-1">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group m-1">
                                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm" data-toggle="modal" data-target="#modal" wire:click="select_model({{ $category }})"><i class="fa fa-edit"></i></button>
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
                    <h5 class="modal-title text-white"><i class="fa fa-star"></i>Category Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="submit">
                        <div class="form-row">
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
