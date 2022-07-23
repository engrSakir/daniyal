<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Dashboard Page</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="javaScript:void();">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard Page</li>
            </ol>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Setting</button>
                <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-toggle="dropdown">
                    <span class="caret"></span>
                </button>
                <div class="dropdown-menu">
                    <a href="javaScript:void();" class="dropdown-item">Action</a>
                    <a href="javaScript:void();" class="dropdown-item">Another action</a>
                    <a href="javaScript:void();" class="dropdown-item">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a href="javaScript:void();" class="dropdown-item">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb-->
    <div class="row">
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
            <div class="card bg-danger shadow-danger">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left">
                            <h4 class="text-white">{{ money_format_india($today_delete_orders) }}</h4>
                            <span class="text-white">Today Delete Orders</span>
                        </div>
                        <i class="icon-like text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
            <div class="card bg-primary shadow-primary">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body text-left">
                            <h4 class="text-white">{{ money_format_india($category->total_sell_of_today()) }}</h4>
                            <span class="text-white">{{ str_limit($category->name, 16, '...') }}</span>
                        </div>
                        <i class="icon-like text-white"></i>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- End container-fluid-->
