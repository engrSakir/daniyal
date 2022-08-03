<div class="col-7">
    <div class="card">
        <div class="card-header bg-danger text-white d-flex justify-content-between">
            @if(config('app.frontend'))
            <a href="{{ route('onlineOrder') }}" class="btn btn-primary">
                Online Order <b>({{ $online_pending_order }}) </b>
            </a>
            @endif
        </div>
        <div class="card-body item-card">
            <div class="row">
                @foreach ($items as $item)
                <div class="col-3">
                    <code>{{ $item->category_wise_items_count ?? 'not' }}</code>
                    <div class="card m-1 hoverable" @if($item->category_wise_items_count == 1) onclick="add_to_basket({{ $item->item_number }})"
                        @else
                        data-bs-toggle="modal" data-bs-target="#category_wise_items_modal"
                        onclick="category_wise_items_modal_open({{ $item->id }}, '{{ $item->name }}')"
                        @endif>
                        <img class="card-img-top rounded mx-auto d-block" height="90px;" style="margin-bottom: -10px;" src="{{ asset($item->image ?? 'assets/images/food-icon.png') }}">
                        <div class="card-body text-center">
                            <p class="card-text" style="margin-bottom: -5px;">
                                {{ $item->id }}) {{ $item->name }}</p>
                            <span class="badge bg-primary">{{ $item->price }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="category_wise_items_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="category_wise_items_modal_title">{{-- Set by jQuery --}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body item-card" id="category_wise_items_modal_body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
</div>
