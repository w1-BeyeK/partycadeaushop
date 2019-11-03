<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Partyslingers | Portfolio</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/brook/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/brook/img/icon.png">

    <!-- Plugins -->
    <link rel="stylesheet" href="/brook/css/bootstrap.min.css">
    <link rel="stylesheet" href="/brook/css/revoulation.css">
    <link rel="stylesheet" href="/brook/css/plugins.css">

    <!-- Style Css -->
    <link rel="stylesheet" href="/brook/style.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="/brook/css/custom.css">.
    <style>
        .mega__width--fullscreen {
            margin-top: -15px !important;
        }



        body {
            line-height: 0px;
        }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/8ed355fa95.css">
    <script src="https://use.fontawesome.com/b43469859c.js"></script>
</head>

<body class="template-color-1 template-font-1 vertical-geadient-home">

<!-- Start PReloader -->
<div id="page-preloader" class="page-loading clearfix">
    <div class="page-load-inner">
        <div class="preloader-wrap">
            <div class="wrap-2">
                <div class=""><img src="/brook/img/icons/brook-preloader.gif" alt="Brook Preloader"></div>
            </div>
        </div>
    </div>
</div>
<!-- End PReloader -->

<!-- Wrapper -->
<div id="wrapper" class="wrapper">
    @if(!empty($menu_items))
        @include("layouts.frontend.header", array("menu_items" => $menu_items))
        @include("layouts.frontend.mobile-menu", array("menu_items" => $menu_items))
    @endif

    @yield("content")
</div>

@include("layouts.frontend.footer")


<!--// Wrapper -->
<!-- Js Files -->
<script src="/brook/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="/brook/js/vendor/jquery.min.js"></script>
<script src="/brook/js/popper.min.js"></script>
<script src="/brook/js/bootstrap.min.js"></script>
<script src="/brook/js/plugins.js"></script>
<script src="/brook/js/main.js"></script>

<!-- REVOLUTION JS FILES -->
<script src="/brook/js/jquery.themepunch.tools.min.js"></script>
<script src="/brook/js/jquery.themepunch.revolution.min.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="/brook/js/revolution.extension.actions.min.js"></script>
<script src="/brook/js/revolution.extension.carousel.min.js"></script>
<script src="/brook/js/revolution.extension.kenburn.min.js"></script>
<script src="/brook/js/revolution.extension.layeranimation.min.js"></script>
<script src="/brook/js/revolution.extension.migration.min.js"></script>
<script src="/brook/js/revolution.extension.navigation.min.js"></script>
<script src="/brook/js/revolution.extension.parallax.min.js"></script>
<script src="/brook/js/revolution.extension.slideanims.min.js"></script>
<script src="/brook/js/revolution.extension.video.min.js"></script>
<script src="/brook/js/revoulation.js"></script>

@yield("js")

</body>

</html>