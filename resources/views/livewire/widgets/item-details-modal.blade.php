<div>
    <!-- Quick-view modal popup start-->

    <div wire:ignore.self class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content quick-view-modal">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    @if($category_wise_item)
                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="quick-view-img">
                                <img src=" {{ asset($category_wise_item->item->image ?? 'assets/images/no-image.png') }}" alt="" class="img-fluid bg-img">
                            </div>
                        </div>
                        <div class="col-lg-6 rtl-text">
                            <div class="product-right">
                                <div class="pro-group">
                                    <h2 id="product_name"> {{ $category_wise_item->item->name ?? 'N/A' }} </h2>
                                    <ul class="pro-price">
                                        <li>{{ $category_wise_item->price }} BDT</li>
                                    </ul>
                                </div>
                                <div class="pro-group">
                                    <h6 class="product-title">Shop infomation</h6>
                                    <p>
                                        
                                    </p>
                                </div>
                                <div class="pro-group pb-0">
                                    <div class="product-buttons">
                                        <a href="javascript:void(0)" class="btn cart-btn btn-normal tooltip-top" wire:click="$emit('addToCard', '{{ $category_wise_item->id }}')">
                                            <i class="fa fa-shopping-cart"></i>
                                            add to cart
                                        </a>
                                        <a href="{{ route('details', $category_wise_item->id) }}" class="btn btn-normal tooltip-top" data-tippy-content="view detail">
                                            view detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Quick-view modal popup end-->
    <script>
        $(document).ready(function() {
            window.addEventListener('showItemDetailsModalJsFunction', event => {
                $('#quick-view').modal('show');
            });
        });
    </script>
</div>
