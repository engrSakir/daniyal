<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@isset($title) {{ $title }} | {{ config('app.name', 'Laravel') }} @else {{ config('app.name', 'Laravel') }} @endisset</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/fav.png') }}" type="image/x-icon">
    <!-- simplebar CSS-->
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sidebar CSS-->
    <link href="{{ asset('assets/css/sidebar-menu.css') }}" rel="stylesheet" />
    <!-- Custom Style-->
    <link href="{{ asset('assets/css/app-style.css') }}" rel="stylesheet" />

    {{-- highcharts end --}}
    <script src="{{ asset('assets/highcharts/highcharts.js') }}"></script>
    <script src="{{ asset('assets/highcharts/series-label.js') }}"></script>
    <script src="{{ asset('assets/highcharts/exporting.js') }}"></script>
    <script src="{{ asset('assets/highcharts/export-data.js') }}"></script>
    <script src="{{ asset('assets/highcharts/accessibility.js') }}"></script>
    {{-- <script src="https://code.highcharts.com/maps/modules/map.js"></script> --}}
    {{-- highcharts end --}}
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    @livewireStyles

    <style>
        .gradient-ibiza {
            background-color: #AE292F;
        }

        .gradient-ibiza {
            background: #AE292F;
            background: -webkit-linear-gradient(45deg, #AE292F, #AE292F) !important;
            background: linear-gradient(45deg, #AE292F, #AE292F) !important;
        }

    </style>

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('1b4e3a20b4b71af4a0a9', {
    cluster: 'ap1'
  });

  var channel = pusher.subscribe('website');
  channel.bind('order', function(data) {
    alert(JSON.stringify(data));
  });
</script>
</head>

<body>

    <!-- Start wrapper-->
    <div id="wrapper">

        @include('layouts.partials.sidebar')
        @include('layouts.partials.topbar')

        <div class="clearfix"></div>

        <div class="content-wrapper">
            @yield('content')
            @isset($slot){{ $slot }}@endisset
        </div>
        <!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->

        @include('layouts.partials.footer')
    </div>
    <!--End wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!-- simplebar js -->
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.js') }}"></script>
    <!-- waves effect js -->
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <!-- sidebar-menu js -->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('assets/js/app-script.js') }}"></script>
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</body>
</html>
