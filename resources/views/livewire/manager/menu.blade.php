<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Menu Page</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">{{ config('app.name') }}</a></li>
                <li class="breadcrumb-item"><a href="javaScript:void();">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Menu Page</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb-->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="row">
                    @foreach ($item_categories as $category)
                    <div class="card-body col-lg-12">
                        {{ $category->name }}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="row">
                    @foreach ($setmenu_categories as $category)
                    <div class="card-body col-lg-12">
                        {{ $category->name }}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End container-fluid-->
