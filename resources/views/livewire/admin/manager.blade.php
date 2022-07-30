<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Manager Page</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="javaScript:void();">Manager</a></li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb-->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    Items
                    <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-toggle="modal" data-target="#modal" wire:click="create"><i class="fa fa-plus mr-1"></i></button>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table">
                            <thead class="thead-primary shadow-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($managers as $manager)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $manager->name }}
                                    </td>
                                    <td>{{ $manager->phone }}</td>
                                    <td>
                                        <div class="btn-group m-1">
                                            <button type="button" class="btn btn-warning waves-effect waves-light btn-sm" data-toggle="modal" data-target="#modal" wire:click="select_model({{ $manager }})"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light btn-sm"><i class="fa fa fa-trash-o"></i></button>
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
    <div class="modal fade" id="modal" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white"><i class="fa fa-star"></i>Manager Form</h5>
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
                            <div class="form-group col-md-6">
                                <label for="phone">phone</label>
                                <input type="text" class="form-control" wire:model="phone" id="phone">
                                <x-error name="phone" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">password</label>
                                <input type="text" class="form-control" wire:model="password" id="password">
                                <x-error name="password" />
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
