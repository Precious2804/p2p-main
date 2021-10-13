<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from iamubaidah.com/html/oitila/live/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 May 2021 16:59:10 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{env('APP_NAME')}} </title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{URL::asset('favicon.ico')}}" type="image/x-icon">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.min.css')}}">
    <!-- fontawesome icon  -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/fontawesome.min.css')}}">
    <!-- flaticon css -->
    <link rel="stylesheet" href="{{URL::asset('assets/fonts/flaticon.css')}}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/animate.css')}}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/modal-video.min.css')}}">
    <!-- slick css -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/slick-theme.css')}}">
    <!-- toastr js -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/toastr.min.css')}}">
    <!-- data table -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/jquery.dataTables.css')}}">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/responsive.css')}}">
</head>    
<body>

        <!-- preloader begin-->
        <div class="preloader">
            <img src="assets/img/tenor.gif" alt="">
        </div>
        <!-- preloader end -->

        <div class="mobile-navbar-wrapper">

            <!-- header begin -->
            <div class="header" id="header">
                <div class="bottom">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-xl-3 col-lg-2 d-xl-flex d-lg-flex d-block align-items-center">
                                <div class="row">
                                    <div class="col-6 d-xl-none d-lg-none d-block">
                                        <button class="navbar-toggler" type="button">
                                            <span class="dag"></span>
                                            <span class="dag2"></span>
                                            <span class="dag3"></span>
                                        </button>    
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-6 d-xl-block d-lg-block d-flex align-items-center justify-content-end">
                                        <div class="logo">
                                            <a href="{{ route('landing') }}">
                                                <img src="{{URL::asset('assets/img/pycrest.png')}}" alt="" width="100px" height="100px">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-10">
                                <div class="mainmenu">
                                    <div class="d-xl-none d-lg-none d-block">
                                    </div>
                                    <nav class="navbar navbar-expand-lg">              

                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav ml-auto">
                                                <li class="nav-item dropdown show">
                                                    <a class="nav-link " href="{{ route('landing') }}" role="button" style="color: lightskyblue;" id="homeDropdown" aria-haspopup="true" aria-expanded="false">
                                                        Home
                                                    </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('about') }}" style="color: lightskyblue;">about us<span class="sr-only">(current)</span></a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('contact') }}" style="color: lightskyblue;">contact us</a>
                                                </li>
                                                <li class="nav-item btn btn-primary">
                                                    <a class="nav-link" href="{{ route('logout') }}">Log Out</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header end -->
            <!---contents --->
            @yield('content')
            <!-- footer begin -->
            <div class="footer">
                <div class="footer-top">
                    <div class="row">
                        <div class="">
                            <div class="col-xl-8 col-lg-8 col-md-10 col-sm-12" style="margin-left: 30px;">
                                <div class="about-widget">
                                    <a href="{{ route('landing') }}" class="logo">
                                    <img src="{{URL::asset('assets/img/pycrest.png')}}" alt="">
                                    </a>
                                    <p>Grow your money with Safety, Invest in {{env('APP_NAME')}} now</p>
                                    <div class="social-links">
                                        <ul>
                                            <li>
                                                <a href="#0" class="single-link">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#0" class="single-link">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#0" class="single-link">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#0" class="single-link">
                                                    <i class="fab fa-pinterest-p"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-10" style="margin-left: 30px;">
                                <div class="link-widget">
                                    <h4 class="title">
                                        Useful links
                                    </h4>
                                    <ul>
                                        <li>
                                            <a href="{{ route('landing') }}" class="single-link">
                                                Home
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('dashboard') }}" class="single-link">
                                                Dashboard
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('about') }}" class="single-link">
                                                About Us
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <a href="{{ route('contact') }}" class="single-link">
                                                Contact Us
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="copyright-area">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-8">
                                <p>Copyright © <a href="{{ route('landing') }}">{{env('APP_NAME')}}</a> - 2020. All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer end -->
            
        </div> <!-- mobile navbar wrapper end -->

        <div class="d-xl-none d-lg-none d-block">
            <div class="mobile-navigation-bar">
                <ul>
                    <li>
                        <a href="#0">
                            <img src="{{URL::asset('assets/img/svg/profile.svg')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#0">
                            <img src="{{URL::asset('assets/img/svg/money-transfering.svg')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#0">
                            <img src="{{URL::asset('assets/img/svg/calculator.svg')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="#header">
                            <img src="{{URL::asset('assets/img/svg/arrow.svg')}}" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="d-xl-block d-lg-block d-none">
            <div class="back-to-top-btn">
                <a href="#">
                    <img src="{{URL::asset('assets/img/svg/arrow.svg')}}" alt="">
                </a>
            </div>
        </div>
     
        <!-- jquery -->
        <script src="{{URL::asset('assets/js/jquery.js')}}"></script>
        <!-- popper js -->
        <script src="{{URL::asset('assets/js/popper.min.js')}}"></script>
        <!-- bootstrap -->
        <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
        <!-- modal video js -->
        <script src="{{URL::asset('assets/js/jquery-modal-video.min.js')}}"></script>
        <!-- slick js -->
        <script src="{{URL::asset('assets/js/slick.min.js')}}"></script>
        <!-- toastr js -->
        <script src="{{URL::asset('assets/js/toastr.min.js')}}"></script>
        <!-- investment profit calculator-->
        <script src="{{URL::asset('assets/js/investment-profit-calculator.js')}}"></script>
        <!-- main -->
        <script src="{{URL::asset('assets/js/main.js')}}"></script>
        <!-- chart js -->
        <script src="{{URL::asset('assets/js/Chart.min.js')}}"></script>
        <script src="{{URL::asset('assets/js/chart-activate.js')}}"></script>
        <!-- utils for chart js -->
        <script src="{{URL::asset('assets/js/utils.js')}}"></script>
        <!-- data table -->
        <script src="{{URL::asset('assets/js/jquery.dataTables.js')}}"></script>
        <script src="{{URL::asset('assets/js/data-able-active.js')}}"></script>
        <!-- clock js -->
        <script src="{{URL::asset('assets/js/clock.min.js')}}"></script>
        <!-- main -->
        <script src="{{URL::asset('assets/js/main.js')}}"></script>
        <script src="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js')}}"
         integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
         crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </body>


<!-- Mirrored from iamubaidah.com/html/oitila/live/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 21 May 2021 17:01:17 GMT -->
</html>