        <!--Start sidebar-wrapper-->
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo" style="height:100px;">
                <a href="{{ route('login') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="" width="200px;">
                    {{-- <img src="{{ asset('assets/images/fav.png') }}" class="logo-icon" alt="">
                    <h5 class="logo-text">{{ config('app.name', 'Laravel') }}</h5> --}}
                </a>
            </div>
            <ul class="sidebar-menu do-nicescrol">
                @if(auth()->user()->admin())
                <li class="sidebar-header">Admin</li>
                <li><a href="{{ route('admin.dashboard') }}" class="waves-effect"><i class="fa fa-circle-o text-aqua"></i> <span>Dashboard</span></a></li>
                <li><a href="{{ route('admin.manager') }}" class="waves-effect"><i class="fa fa-circle-o text-aqua"></i> <span>Manager</span></a></li>
                @endif

                @if(auth()->user()->manager())
                <li class="sidebar-header">Manager</li>
                <li><a href="{{ route('manager.dashboard') }}" class="waves-effect"><i class="fa fa-circle-o text-aqua"></i> <span>Dashboard</span></a></li>
                <li><a href="{{ route('manager.sale') }}" class="waves-effect"><i class="fa fa-circle-o text-aqua"></i> <span>Sales</span></a></li>
                <li><a href="{{ route('manager.menu') }}" class="waves-effect"><i class="fa fa-circle-o text-aqua"></i> <span>Menu</span></a></li>
                <li><a href="{{ route('manager.expense') }}" class="waves-effect"><i class="fa fa-circle-o text-aqua"></i> <span>Expense</span></a></li>
                <li><a href="{{ route('manager.report') }}" class="waves-effect"><i class="fa fa-circle-o text-aqua"></i> <span>Report</span></a></li>
                <li class="">
                    <a href="javaScript:void();" class="waves-effect">
                        <i class="fa fa-share"></i> <span>Setting</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{ route('manager.category') }}"><i class="fa fa-circle-o"></i> Menu Setting </a></li>
                        {{-- <li><a href="{{ route('manager.item') }}"><i class="fa fa-circle-o"></i> Item Shortcut</a>
                </li> --}}
                <li><a href="{{ route('manager.table') }}"><i class="fa fa-circle-o"></i> Table Setting</a></li>
                <li><a href="{{ route('manager.waiter') }}"><i class="fa fa-circle-o"></i> Waiter List</a></li>
                {{-- <li><a href="{{ route('manager.offer') }}"><i class="fa fa-circle-o"></i> Offer setting</a></li> --}}
            </ul>
            </li>
            @endif
            {{-- <li><a href="https://sakir-php.github.io/color-version/" target="_blank" class="waves-effect"><i class="fa fa-circle-o text-aqua"></i> <span>HTML</span></a></li> --}}
            </ul>

        </div>
        <!--End sidebar-wrapper-->
