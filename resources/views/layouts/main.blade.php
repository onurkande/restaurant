<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {{-- <link rel="icon" type="image/png" href="images/favicon.png"> --}}
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery.exzoom.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/spacing.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    @livewireStyles
    @livewireScripts
</head>

<body>

    <!--=============================
        HEADER START
    ==============================-->
    @livewire('site.header')
    <!--=============================
        HEADER END
    ==============================-->


    <!--=============================
        PAGE CONTENT START
    ==============================-->

    @yield('content')

    <!--=============================
        PAGE CONTENT END
    ==============================-->


    <!--=============================
        FOOTER START
    ==============================-->
    @livewire('site.footer')
    <!--=============================
        FOOTER END
    ==============================-->


    <!--=============================
        SCROLL BUTTON START
    ==============================-->
    <div class="tf__scroll_btn"><i class="fas fa-hand-pointer"></i></div>
    <!--=============================
        SCROLL BUTTON END 
    ==============================-->


    <!--jquery library js-->
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <!--bootstrap js-->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <!--font-awesome js-->
    <script src="{{asset('assets/js/Font-Awesome.js')}}"></script>
    <!-- slick slider -->
    <script src="{{asset('assets/js/slick.min.js')}}"></script>
    <!-- isotop js -->
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <!-- counter up js -->
    <script src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.countup.min.js')}}"></script>
    <!-- nice select js -->
    <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
    <!-- venobox js -->
    <script src="{{asset('assets/js/venobox.min.js')}}"></script>
    <!-- sticky sidebar js -->
    <script src="{{asset('assets/js/sticky_sidebar.js')}}"></script>
    <!-- wow js -->
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <!-- ex zoom js -->
    <script src="{{asset('assets/js/jquery.exzoom.js')}}"></script>

    <!--main/custom js-->
    <script src="{{asset('assets/js/main.js')}}"></script>
    

    @yield('script')

</body>

</html>