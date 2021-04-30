<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <title>E-BookShop - Online BookShop Management</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('welcome/images/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('welcome/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('welcome/css/glide.core.css') }}">

    <link rel="stylesheet" href="{{ asset('welcome/css/bootstrap-5.0.5-alpha.min.css') }}">

    <link rel="stylesheet" href="{{ asset('welcome/css/default.css') }}">

    <link rel="stylesheet" href="{{ asset('welcome/css/style.css') }}">
</head>

<body>

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="home" class="header_area">
        <div class="header_hero">
            <div class="single_hero bg_cover d-flex align-items-center"
                style="background-image: url(welcome/images/hero.jpg)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-10">
                            <div class="hero_content text-center">
                                <h2 class="hero_title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">
                                    Welcome to Online</br>Book Shop Management</h2>
                                <p class="wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">Manage your
                                    stock, sales and other related bookshop data. If you're a new user click <a
                                        href="{{ route('register') }}" style="color: #e84e4e">
                                        here </a>
                                    </br>to register. A returning user? Click <a href="{{ route('login') }}"
                                        style="color: #e84e4e"> here
                                    </a> to login to your
                                    dashboard</p>
                                <a href="{{ route('register') }}" class="main-btn wow fadeInUp"
                                    data-wow-duration="1.3s" data-wow-delay="0.8s">Register</a>
                                <a href="{{ route('login') }}" class="main-btn wow fadeInUp" data-wow-duration="1.3s"
                                    data-wow-delay="0.8s">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('welcome/js/bootstrap.bundle-5.0.0.alpha-min.js') }}"></script>

    {{-- <script src="{{ asset('welcome/js/glide.min.js') }}"></script> --}}

    <script src="{{ asset('welcome/js/wow.min.js') }}"></script>

    <script src="{{ asset('welcome/js/main.js') }}"></script>

</html>


{{-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}
