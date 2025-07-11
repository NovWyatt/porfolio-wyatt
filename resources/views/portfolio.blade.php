<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wyatt - HoangfTuaans</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Thẻ mô tả trang -->
    <meta name="description" content="Portfolio của Hoangf Tuaans, chuyên thiết kế web và phát triển phần mềm web.">
    <!-- Từ khóa liên quan -->
    <meta name="keywords" content="Hoangf Tuaans, thiết kế web, lập trình viên, dịch vụ website, SEO, tool python">
    <!-- Tác giả -->
    <meta name="author" content="Wyatt">
    <link rel="canonical" href="https://wyatt.io.vn">

    <meta property="og:title" content="Wyatt - Portfolio của HoangfTuaans">
    <meta property="og:description" content="Các dự án lập trình, thiết kế web ấn tượng của tôi.">
    <meta property="og:image" content="https://wyatt.io.vn/apple-touch-icon.png"> <!-- Ảnh đại diện khi share -->
    <meta property="og:url" content="https://wyatt.io.vn"> <!-- URL hiện tại -->
    <meta property="og:type" content="website">



    <script>
        document.documentElement.classList.remove('no-js');
        document.documentElement.classList.add('js');
    </script>

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/styles.css">

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">

</head>


<body id="top">


    <!-- preloader
    ================================================== -->
    @include('components.preloader')


    <!-- page wrap
    ================================================== -->
    <div id="page" class="s-pagewrap">


        <!-- # site header
        ================================================== -->
        @include('components.header')<!-- end s-header -->


        <!-- # intro
        ================================================== -->
        @include('components.intro')<!-- end s-intro -->


        <!-- # about
        ================================================== -->
        @include('components.about') <!-- end s-about -->



        <!-- # works
        ================================================== -->
        @include('components.works')<!-- end s-works -->


        <!-- # numbers
        ================================================== -->
        {{-- @include('components.numbers') <!-- end s-numbers --> --}}


        <!-- # footer
        ================================================== -->
        @include('components.footer')<!-- end s-footer -->

    </div> <!-- end page-wrap -->


    <!-- Java Script
    ================================================== -->
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
