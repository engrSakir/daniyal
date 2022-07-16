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
        @foreach ($categories as $category)
        <div class="col-lg-6">
            <div class="card border @if($category->has_sub_item) border-danger @else border-info @endif">
                <table class="table table-bordered">
                    <thead class="">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ $category->name }}</th>
                            @if($category->has_sub_category)
                            @foreach ($category->sub_categories as $sub_category)
                            <th scope="col">{{ $sub_category->name }}</th>
                            @endforeach
                            @else
                            <th scope="col">Price</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category->category_wise_items as $category_wise_item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                {{ $category_wise_item->item->name }}
                                @if($category->has_sub_item)
                                <small>
                                    <ol>
                                        @foreach ($category_wise_item->item->sub_items as $sub_tem)
                                        <li>{{ $sub_tem->name }}</li>
                                        @endforeach
                                    </ol>
                                </small>
                                @endif
                            </td>
                            @if($category->has_sub_category)
                            @foreach ($category->sub_categories as $sub_category)
                            <td> {{ price_helper($category_wise_item->item_id, $category_wise_item->category_id, $sub_category->id) }}</td>
                            @endforeach
                            @else
                            <td>{{ $category_wise_item->price }}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- End container-fluid-->
