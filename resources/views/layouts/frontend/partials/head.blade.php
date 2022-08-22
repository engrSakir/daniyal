<title>{{ config('app.name') }}</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="big-deal">
<meta name="keywords" content="big-deal">
<meta name="author" content="big-deal">
<link rel="icon" href="{{ asset('assets/frontend/images/favicon/favicon.png') }}" type="image/x-icon">
<link rel="shortcut icon" href="{{ asset('assets/frontend/images/favicon/favicon.png') }}" type="image/x-icon">

<!--Google font-->
<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

<!--icon css-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/font-awesome.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/themify.css') }}">

<!--Slick slider css-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick-theme.css') }}">

<!--Animate css-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/animate.css') }}">

<!-- Bootstrap css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/bootstrap.css') }}">

<!-- Theme css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/color2.css') }}" media="screen" id="color">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@livewireStyles
@stack('styles')
{{-- Custom style --}}
<style>
    .top_marquee_notice{
        color:white;
        cursor: pointer;
    }
</style>
