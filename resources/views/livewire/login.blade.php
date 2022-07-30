<div id="wrapper">
    <div class="card-authentication2 mx-auto my-5">
        <div class="card-group shadow-lg">
            <div class="card mb-0" style="background-color: #AE292F;">
                {{-- <div class="bg-signin2"></div> --}}
                <div class="card-img-overlay rounded-left my-5">
                    <h2 class="text-white">Hi !</h2>
                    <h1 class="text-white">Welcome</h1>
                    <p class="card-text text-white text-justify pt-3">

                    </p>
                    <p class="text-center mt-5">
                        <img src="{{ asset('assets/images/datatechbdlogo.png') }}" alt="" style="background-color:white; padding:10px; border-radius:10px;">
                    </p>
                </div>
            </div>

            <div class="card mb-0">
                <div class="card-body">
                    <div class="card-content p-3">
                        <div class="text-center pb-3">
                            <img src="{{ asset('assets/images/logo.png') }}" style="width: 50%;" />
                        </div>
                        <form wire:submit.prevent="login">
                            <div class="form-group">
                                <div class="position-relative has-icon-left">
                                    <label for="phone" class="sr-only">Phone number</label>
                                    <input type="number" id="phone" class="form-control" wire:model="phone" placeholder="Phone number">
                                    <div class="form-control-position">
                                        <i class="icon-user"></i>
                                    </div>
                                </div>
                                <x-error name="phone" />
                            </div>
                            <div class="form-group">
                                <div class="position-relative has-icon-left">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" id="password" class="form-control" wire:model="password" placeholder="Password">
                                    <div class="form-control-position">
                                        <i class="icon-lock"></i>
                                    </div>
                                </div>
                                <x-error name="password" />
                            </div>
                            <div class="form-row mr-0 ml-0">
                                <div class="form-group col-6">
                                    <div class="demo-checkbox">
                                        <input type="checkbox" id="user-checkbox" class="filled-in chk-col-primary" checked="" />
                                        <label for="user-checkbox">Remember me</label>
                                    </div>
                                </div>
                                <div class="form-group col-6 text-right">
                                    {{-- <a href="authentication-reset-password2.html">Reset Password</a> --}}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary shadow-primary btn-block waves-effect waves-light">Sign In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
</div>
