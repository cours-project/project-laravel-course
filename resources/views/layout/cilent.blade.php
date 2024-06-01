<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from themefie.com/html/edufie/home-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 May 2024 10:26:18 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edufie - Online Courses Html Template</title>
    <!--fivicon icon-->
    <link rel="icon" href="assets/img/fevicon.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('clients/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/assets/css/magnific.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/assets/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/assets/css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/assets/css/slick-slide.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('clients/assets/css/responsive.css') }}">

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">


</head>
<body class='sc5'>
    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div id="wave1">
            </div>
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>
    <!-- preloader area end -->
    <div class="body-overlay" id="body-overlay"></div>

    <!-- search popup area start -->
    <div class="search-popup" id="search-popup">
        <form action="https://themefie.com/html/edufie/home.html" class="search-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search.....">
            </div>
            <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <!-- //. search Popup -->

    <!-- navbar start -->
    @include('component.clients.header')
    <!-- navbar end -->

    @yield('content')

    <!-- footer area start -->
    @include('component.clients.footer')
    <!-- footer area end -->    

    <!-- back-to-top end -->
    <div class="back-to-top">
        <span class="back-top"><i class="fas fa-angle-double-up"></i></span>
    </div>
    

    <!-- all plugins here -->
    <script src="{{ asset('clients/assets/js/jquery.3.6.min.js') }}"></script>
    <script src="{{ asset('clients/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('clients/assets/js/imageloded.min.js') }}"></script>
    <script src="{{ asset('clients/assets/js/counterup.js') }}"></script>
    <script src="{{ asset('clients/assets/js/waypoint.js') }}"></script>
    <script src="{{ asset('clients/assets/js/magnific.min.js') }}"></script>
    <script src="{{ asset('clients/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('clients/assets/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('clients/assets/js/fontawesome.min.js') }}"></script>
    <script src="{{ asset('clients/assets/js/ripple.js') }}"></script>
    <script src="{{ asset('clients/assets/js/owl.min.js') }}"></script>
    <script src="{{ asset('clients/assets/js/slick-slider.min.js') }}"></script>
    <script src="{{ asset('clients/assets/js/wow.min.js') }}"></script>
    <!-- main js  -->
    <script src="{{ asset('clients/assets/js/main.js') }}"></script>
</body>

</html>