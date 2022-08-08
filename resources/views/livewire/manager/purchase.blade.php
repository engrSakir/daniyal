<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Purchase Page</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="javaScript:void();">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Purchase Page</li>
            </ol>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-toggle="modal" data-target="#modal"><i class="fa fa-plus mr-1"></i> Create </button>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb-->
    <div class="row">
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
            <div class="card gradient-bloody">
              <div class="card-body p-4">
                <div class="media">
                <div class="media-body text-left">
                  <h4 class="text-white">{{ money_format_india($purchases->sum('amount')) }}</h4>
                  <span class="text-white">Total Purchases</span>
                </div>
                <div class="align-self-center w-icon"><i class="icon-wallet text-white"></i></div>
              </div>
              </div>
            </div>
          </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-primary shadow-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Today's History</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchase_categories as $purchase_category)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $purchase_category->name }}
                                    </td>
                                    <td>
                                        @foreach ($purchases->where('category_id', $purchase_category->id) as $purchase)
                                        <span class="badge badge-danger m-1" title="{{ $purchase->title ?? 'N/A' }}"> {{ $purchase->amount }}</span> 
                                        @endforeach
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
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-primary shadow-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Short Note (Title)</th>
                                    <th scope="col">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchase_categories as $purchase_category)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $purchase_category->name }}
                                    </td>
                                    <td>
                                        <input type="text" class="form-control @error("purchase_fields.$purchase_category->id.title") bg-danger @enderror" placeholder="Title" wire:model="purchase_fields.{{ $purchase_category->id }}.title">
                                    </td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control @error("purchase_fields.$purchase_category->id.amount") bg-danger @enderror" placeholder="Amount" wire:model="purchase_fields.{{ $purchase_category->id }}.amount">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="button" wire:click="add_purchase({{ $purchase_category->id }})">+</button>
                                            </div>
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
</div>
<!-- End container-fluid-->
