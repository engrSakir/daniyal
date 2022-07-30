<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Profile Page</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="javaScript:void();">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile Page</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb-->
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-primary">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary">{{ auth()->user()->name }}</h5>
                    <h5 class="card-title text-primary">{{ auth()->user()->phone }}</h5>
                    <input type="password" class="form-control form-control-lg mb-3 @error('old_password') border-danger @enderror" wire:model="old_password" placeholder="Old Password">
                    <input type="password" class="form-control form-control-lg mb-3 @error('new_password') border-danger @enderror" wire:model="new_password" placeholder="New Password">
                    <input type="password" class="form-control form-control-lg @error('confirm_password') border-danger @enderror" wire:model="confirm_password" placeholder="Confirm Password">
                    <hr>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <hr>
                    @endif
                    <button wire:click="change_password" class="btn btn-inverse-primary waves-effect waves-light m-1 w-100">
                        UPDATE
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End container-fluid-->
