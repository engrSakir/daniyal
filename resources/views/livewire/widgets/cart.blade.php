<div>
    <div id="cart_side" class="add_to_cart right ">
        <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
        <div class="cart-inner">
            <div class="cart_top">
                <h3>my cart</h3>
                <div class="close-cart">
                    <a href="javascript:void(0)" onclick="closeCart()">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="cart_media">
                <ul class="cart_product">
                    @foreach ($items as $item)
                    <li>
                        <div class="media">
                            <a href="product-page(left-sidebar).html">
                                <img alt="megastore1" class="me-3" src="{{ asset($item->image ?? 'assets/images/no-image.png') }}">
                            </a>
                            <div class="media-body">
                                <a href="product-page(left-sidebar).html">
                                    <h4>{{ $item->name }}</h4>
                                </a>
                                <h6>
                                    {{ $item->price }} TK
                                </h6>
                                <div class="addit-box">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus" wire:click="updateQuantity({{ $item->id }}, '-')"></button>
                                            <input class="form-control" style="font-size: 8px;" type="number" readonly value="{{ $item->quantity }}" />
                                            <button class="qty-plus" wire:click="updateQuantity({{ $item->id }}, '+')"></button>
                                        </div>
                                    </div>
                                    <div class="pro-add">
                                        <a href="javascript:void(0)" class="text-danger" wire:click="remove_item({{ $item->id }})">
                                            <i data-feather="trash"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    
                </ul>
                <ul class="cart_total">
                    <li>
                        subtotal : <span>$1050.00</span>
                    </li>
                    <li>
                        shpping <span>free</span>
                    </li>
                    <li>
                        taxes <span>$0.00</span>
                    </li>
                    <li>
                        <div class="total">
                            total<span>$1050.00</span>
                        </div>
                    </li>
                    <li>
                        <div class="buttons">
                            <a href="cart.html" class="btn btn-solid btn-sm">view cart</a>
                            <a href="checkout.html" class="btn btn-solid btn-sm ">checkout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
