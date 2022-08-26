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
                                <td style="text-align: left;">
                                    <a href="{{ route('details', $item->id) }}">{{ $item->name }}</a>
                                </td>
                                <td>
                                    {{ $item->price }} TK
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus" wire:click="$emit('updateQuantity', {{ $item->id }}, '-')"></button>
                                            <input class="form-control" readonly type="number" value="{{ $item->quantity }}" />
                                            <button class="qty-plus" wire:click="$emit('updateQuantity', {{ $item->id }}, '+')"></button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2>{{ $item->getPriceSum() }} TK</h2>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger text-white">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="section-big-py-space b-g-light">
        <div class="custom-container">
            <div class="checkout-page contact-page">
                <div class="checkout-form">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <div class="theme-form">
                                    <div class="row check-out">
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label>Full Name</label>
                                            <input type="text" name="field-name" wire:model="full_name" placeholder="">
                                            @error('full_name')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                            <label class="field-label">Phone</label>
                                            <input type="text" name="field-name" wire:model="phone_number" placeholder="">
                                            @error('phone_number')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label class="field-label">address</label>
                                            <input type="text" name="field-name" wire:model="full_address" placeholder="">
                                            @error('full_address')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <label class="field-label">Special Note</label>
                                            <textarea name="" id="" cols="30" rows="20" class="form-control" wire:model="special_note" style="height: 100px;"></textarea>
                                            @error('special_note')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <button type="button" class="w-100 btn btn-success text-white" wire:click="order_submit">Order Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--section end-->
</div>
