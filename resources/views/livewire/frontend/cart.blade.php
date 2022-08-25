<div>
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>Cart</h2>
                            <ul>
                                <li><a href="index.html">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">Cart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="wishlist-section section-big-py-space b-g-light">
        <div class="custom-container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table cart-table table-responsive-xs">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product name</th>
                                <th scope="col">price</th>
                                <th scope="col">QTY</th>
                                <th scope="col">sub total</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td>
                                    <a href="{{ route('details', $item->id) }}"><img src="{{ asset($item->image ?? 'assets/images/no-image.png') }}" alt="" class="img-fluid"></a>
                                </td>
                                <td>
                                    <a href="{{ route('details', $item->id) }}">{{ $item->name }}</a>
                                </td>
                                <td>
                                    {{ $item->price }} TK
                                </td>
                                <td>
                                    {{ $item->quantity }}
                                </td>
                                <td>
                                    <h2>{{ $item->getPriceSum() }} TK</h2>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus" wire:click="$emit('updateQuantity', {{ $item->id }}, '-')"></button>
                                            <input class="form-control" readonly type="number" value="{{ $item->quantity }}" />
                                            <button class="qty-plus" wire:click="$emit('updateQuantity', {{ $item->id }}, '+')"></button>
                                        </div>
                                    </div>
                                    {{-- <a href="javascript:void(0)" class="icon me-3"><i class="ti-close"></i> </a><a href="javascript:void(0)" class="cart"><i class="ti-shopping-cart"></i></a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row wishlist-buttons">
               <div class="col-12">
                <div class="footer-contant">
                    <div class="newsletter-second">
                      <div class="form-group">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="enter full name">
                          <span class="input-group-text"><i class="ti-user"></i></span>
                        </div>
                      </div>
                      <div class="form-group ">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="enter email address">
                          <span class="input-group-text"><i class="ti-email"></i></span>
                        </div>
                      </div>
                      <div class="form-group mb-0">
                        <a href="javascript:void(0)" class="btn btn-solid btn-sm">submit now</a>
                      </div>
                    </div>
                  </div>
               </div>
            </div>
        </div>
    </section>
    <!--section end-->
</div>
