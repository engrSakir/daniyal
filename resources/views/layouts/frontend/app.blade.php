<!DOCTYPE html>
<html lang="en">
<head>
   @include('layouts.frontend.partials.head')
</head>
<body>

<!-- loader start -->
<div class="loader-wrapper">
    <div>
        <img src="../assets/frontend/images/loader.gif" alt="loader">
    </div>
</div>
<!-- loader end -->

@include('layouts.frontend.partials.header')

@yield('content')

@include('layouts.frontend.partials.footer')

<!-- edit product modal start-->
<div class="modal fade bd-example-modal-lg theme-modal pro-edit-modal" id="edit-product" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content ">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="pro-group">
          <div class="product-img">
            <div class="media">
              <div class="img-wraper">
                <a href="product-page(left-sidebar).html">
                  <img src="../assets/frontend/images/layout-2/product/1.jpg" alt="">
                </a>
              </div>
              <div class="media-body">
                <a href="product-page(left-sidebar).html">
                  <h3>redmi not 3</h3>
                </a>
                <h6>$80<span>$120</span></h6>
              </div>
            </div>
          </div>
        </div>
        <div class="pro-group">
          <h6 class="product-title">Select Size</h6>
          <div class="size-box">
            <ul>
              <li ><a href="javascript:void(0)">s</a></li>
              <li><a href="javascript:void(0)">m</a></li>
              <li><a href="javascript:void(0)">l</a></li>
              <li><a href="javascript:void(0)">xl</a></li>
              <li><a href="javascript:void(0)">2xl</a></li>
            </ul>
          </div>
        </div>
        <div class="pro-group">
          <h6 class="product-title">Select color</h6>
          <div class="color-selector inline">
            <ul>
              <li>
                <div class="color-1 active"></div>
              </li>
              <li>
                <div class="color-2"></div>
              </li>
              <li>
                <div class="color-3"></div>
              </li>
              <li>
                <div class="color-4"></div>
              </li>
              <li>
                <div class="color-5"></div>
              </li>
              <li>
                <div class="color-6"></div>
              </li>
              <li>
                <div class="color-7"></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="pro-group">
          <h6 class="product-title">Quantity</h6>
          <div class="qty-box">
            <div class="input-group">
              <button class="qty-minus"></button>
              <input class="qty-adj form-control" type="number" value="1"/>
              <button class="qty-plus"></button>
            </div>
          </div>
        </div>
        <div class="pro-group mb-0">
          <div class="modal-btn">
            <a href="cart.html" class="btn btn-solid btn-sm">
              add to cart
            </a>
            <a href="product-page(left-sidebar).html" class="btn btn-solid btn-sm">
              more detail
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- edit product modal end-->

<!-- Add to cart bar -->
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
        <li>
          <div class="media">
            <a href="product-page(left-sidebar).html">
              <img alt="megastore1" class="me-3" src="../assets/frontend/images/layout-2/product/1.jpg">
            </a>
            <div class="media-body">
              <a href="product-page(left-sidebar).html">
                <h4>redmi not 3</h4>
              </a>
              <h6>
                $80.00 <span>$120.00</span>
              </h6>
              <div class="addit-box">
                <div class="qty-box">
                  <div class="input-group">
                    <button class="qty-minus"></button>
                    <input class="qty-adj form-control" type="number" value="1"/>
                    <button class="qty-plus"></button>
                  </div>
                </div>
                <div class="pro-add">
                  <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit-product" >
                    <i data-feather="edit"></i>
                  </a>
                  <a href="javascript:void(0)">
                    <i  data-feather="trash-2"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="media">
            <a href="product-page(left-sidebar).html">
              <img alt="megastore1" class="me-3" src="../assets/frontend/images/layout-2/product/2.jpg">
            </a>
            <div class="media-body">
              <a href="product-page(left-sidebar).html">
                <h4>Double Door Refrigerator</h4>
              </a>
              <h6>
                $80.00 <span>$120.00</span>
              </h6>
              <div class="addit-box">
                <div class="qty-box">
                  <div class="input-group">
                    <button class="qty-minus"></button>
                    <input class="qty-adj form-control" type="number" value="1"/>
                    <button class="qty-plus"></button>
                  </div>
                </div>
                <div class="pro-add">
                  <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit-product" >
                    <i data-feather="edit"></i>
                  </a>
                  <a href="javascript:void(0)">
                    <i  data-feather="trash-2"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="media">
            <a href="product-page(left-sidebar).html">
              <img alt="megastore1" class="me-3" src="../assets/frontend/images/layout-2/product/3.jpg">
            </a>
            <div class="media-body">
              <a href="product-page(left-sidebar).html">
                <h4>woman hande bag</h4>
              </a>
              <h6>
                $80.00 <span>$120.00</span>
              </h6>
              <div class="addit-box">
                <div class="qty-box">
                  <div class="input-group">
                    <button class="qty-minus"></button>
                    <input class="qty-adj form-control" type="number" value="1"/>
                    <button class="qty-plus"></button>
                  </div>
                </div>
                <div class="pro-add">
                  <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit-product" >
                    <i data-feather="edit"></i>
                  </a>
                  <a href="javascript:void(0)">
                    <i  data-feather="trash-2"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </li>
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
<!-- Add to cart bar end-->

<!-- wishlistbar bar -->
<div id="wishlist_side" class="add_to_cart right ">
  <a href="javascript:void(0)" class="overlay"  onclick="closeWishlist()"></a>
  <div class="cart-inner">
    <div class="cart_top">
      <h3>my wishlist</h3>
      <div class="close-cart">
        <a href="javascript:void(0)" onclick="closeWishlist()">
          <i class="fa fa-times" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="cart_media">
      <ul class="cart_product">
        <li>
          <div class="media">
            <a href="product-page(left-sidebar).html">
              <img alt="megastore1" class="me-3" src="../assets/frontend/images/layout-2/product/1.jpg">
            </a>
            <div class="media-body">
              <a href="product-page(left-sidebar).html">
                <h4>redmi not 3</h4>
              </a>
              <h6>
                $80.00 <span>$120.00</span>
              </h6>
              <div class="addit-box">
                <div class="qty-box">
                  <div class="input-group">
                    <button class="qty-minus"></button>
                    <input class="qty-adj form-control" type="number" value="1"/>
                    <button class="qty-plus"></button>
                  </div>
                </div>
                <div class="pro-add">
                  <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit-product" >
                    <i data-feather="edit"></i>
                  </a>
                  <a href="javascript:void(0)">
                    <i  data-feather="trash-2"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="media">
            <a href="product-page(left-sidebar).html">
              <img alt="megastore1" class="me-3" src="../assets/frontend/images/layout-2/product/2.jpg">
            </a>
            <div class="media-body">
              <a href="product-page(left-sidebar).html">
                <h4>Double Door Refrigerator</h4>
              </a>
              <h6>
                $80.00 <span>$120.00</span>
              </h6>
              <div class="addit-box">
                <div class="qty-box">
                  <div class="input-group">
                    <button class="qty-minus"></button>
                    <input class="qty-adj form-control" type="number" value="1"/>
                    <button class="qty-plus"></button>
                  </div>
                </div>
                <div class="pro-add">
                  <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit-product" >
                    <i data-feather="edit"></i>
                  </a>
                  <a href="javascript:void(0)">
                    <i  data-feather="trash-2"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="media">
            <a href="product-page(left-sidebar).html">
              <img alt="megastore1" class="me-3" src="../assets/frontend/images/layout-2/product/3.jpg">
            </a>
            <div class="media-body">
              <a href="product-page(left-sidebar).html">
                <h4>woman hande bag</h4>
              </a>
              <h6>
                $80.00 <span>$120.00</span>
              </h6>
              <div class="addit-box">
                <div class="qty-box">
                  <div class="input-group">
                    <button class="qty-minus"></button>
                    <input class="qty-adj form-control" type="number" value="1"/>
                    <button class="qty-plus"></button>
                  </div>
                </div>
                <div class="pro-add">
                  <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#edit-product" >
                    <i data-feather="edit"></i>
                  </a>
                  <a href="javascript:void(0)">
                    <i  data-feather="trash-2"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </li>
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
            <a href="wishlist.html" class="btn btn-solid btn-block btn-md">view wislist</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- wishlistbar bar end-->

<!-- My account bar start-->
@livewire('widgets.my-account')
<!-- Add to account bar end-->

<!-- add to  setting bar  start-->
<div id="mySetting" class="add_to_cart right">
  <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
  <div class="cart-inner">
    <div class="cart_top">
      <h3>my setting</h3>
      <div class="close-cart">
        <a href="javascript:void(0)" onclick="closeSetting()">
          <i class="fa fa-times" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="setting-block">
      <div class="form-group">
        <select>
          <option value="">language</option>
          <option value="">english</option>
          <option value="">french</option>
          <option value="">hindi</option>
        </select>
      </div>
      <div class="form-group">
        <select>
          <option value="">currency</option>
          <option value="">uro</option>
          <option value="">ruppees</option>
          <option value="">piund</option>
          <option value="">doller</option>
        </select>
      </div>
    </div>
  </div>
</div>
<!-- add to  setting bar  end-->

@include('layouts.frontend.partials.foot')
</body>
</html>
