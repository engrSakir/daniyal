<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Report Page</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="javaScript:void();">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Report Page</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb-->
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-primary">
             <img src="{{ asset('assets/images/report-card-cover.png') }}" class="card-img-top">
             <div class="card-body text-center">
               <h5 class="card-title text-primary">Daily Report</h5>
               <input type="date" class="form-control form-control-lg @error('date_for_daily_report') border-danger @enderror" wire:model="date_for_daily_report">
               <hr>
               <a href="{{ route('manager.daily_report', $date_for_daily_report ?? date('d-m-Y')) }}" class="btn btn-inverse-primary waves-effect waves-light m-1 w-100" target="_blank">
                <i class="fa fa-globe mr-1"></i>Download for {{ $date_for_daily_report ?? date('Y-m-d') }}
                </a>
             </div>
           </div>
           </div>
    </div>
</div>
<!-- End container-fluid-->
