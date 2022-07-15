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

        @foreach ($item_categories as $category)
        <div class="col-lg-6">
            <div class="card border border-info">
                <div class="card-header text-uppercase">{{ $category->name }}</div>
                <div class="card-body">
                    <ol>
                        @foreach ($category->items as $item)
                        <li>{{ $item->name }} - <b>{{ $item->price }}</b></li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
        @endforeach
        @foreach ($setmenu_categories as $category)
        @foreach ($category->set_menues as $set_menu)
        <div class="col-lg-6">
            <div class="card border border-danger">
                <div class="card-header text-uppercase">{{ $set_menu->name }} <sup><small>{{ $category->name }}</small></sup></div>
                <div class="card-body">
                    <ol>
                        @foreach ($set_menu->set_menu_wisse_items as $set_menu_wisse_item)
                        <li>{{ $set_menu_wisse_item->item->name ?? 'NA' }}</li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
        @endforeach
        @endforeach

    </div>
</div>
<!-- End container-fluid-->
