<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <title>@yield('title') | Saadet</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('/') }}images/favicon.ico">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    @yield('style')

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('/') }}lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link rel="icon" href="{{ asset('/') }}img/cropped-logo-32x32.png" sizes="32x32">
    <link rel="icon" href="{{ asset('/') }}img//cropped-logo-192x192.png" sizes="192x192">
    <link rel="apple-touch-icon" href="{{ asset('/') }}img//cropped-logo-180x180.png">
    <meta name="msapplication-TileImage" content="{{ asset('/') }}img//cropped-logo-270x270.png">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/') }}css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('/') }}css/style.css" rel="stylesheet">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">
    <!--Header Start -->
    @include('inc.header')
    <!--Header End -->
    @yield('body')
    <!--Footer Start -->
    @include('inc.footer')
    <!--Footer End -->

     <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('/') }}lib/wow/wow.min.js"></script>
    <script src="{{ asset('/') }}lib/easing/easing.min.js"></script>
    <script src="{{ asset('/') }}lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('/') }}lib/typed/typed.min.js"></script>
    <script src="{{ asset('/') }}lib/counterup/counterup.min.js"></script>
    <script src="{{ asset('/') }}lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('/') }}lib/isotope/isotope.pkgd.min.js"></script>
    <script src="{{ asset('/') }}lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('/') }}js/main.js"></script>

    @yield('script')
</body>

</html>