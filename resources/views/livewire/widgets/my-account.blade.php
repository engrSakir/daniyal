<div wire:ignore.self id="myAccount" class="add_to_cart right account-bar">
    <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
    <div class="cart-inner">
        <div class="cart_top">
            <h3>my account</h3>
            <div class="close-cart">
                <a href="javascript:void(0)" onclick="closeAccount()">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        @guest
        <form class="theme-form" wire:submit.prevent="login">
            <div class="form-group">
                <label for="login_email">Email</label>
                <input type="text" class="form-control" id="login_email" placeholder="Email" wire:model="email_address">
                @error('email_address')
                <div class="alert alert-danger text-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="login_password">Password</label>
                <input type="password" class="form-control" id="login_password" placeholder="Enter your password" wire:model="password">
                @error('password')
                <div class="alert alert-danger text-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <button type="submit" class="btn btn-solid btn-md btn-block">Login</button>
            </div>
            <div class="accout-fwd">
                <a href="#" class="d-block">
                    <h5>forget password?</h5>
                </a>
                <a href="#" class="d-block">
                    <h6>you have no account ?<span>signup now</span></h6>
                </a>
            </div>
        </form>
        @else
        <a href="{{ route('dashboard') }}" class="d-block">
            <h5>Dashboard</h5>
        </a>
        @endguest

    </div>
</div>

