<!-- Header -->
<header class="br_header header-default header-transparent  black-logo--version haeder-fixed-width haeder-fixed-150 headroom--sticky header-mega-menu clearfix">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="header__wrapper mr--0">
                    <!-- Header Left -->
                    <div class="header-left">
                        <div class="logo">
                            <a href="index.html">
                                <img src="/img/logo.png" alt="Brook Images">
                            </a>
                        </div>
                    </div>
                    @include("layouts.frontend.menu", array("menu_items" => $menu_items))
                    <!-- Header Right -->
                    <div class="header-right">
                        <!-- Start Hamberger -->
                        <div class="manu-hamber popup-mobile-click d-block d-lg-none black-version d-block d-xl-none">
                            <div>
                                <i></i>
                            </div>
                        </div>
                        <!-- End Hamberger -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--// Header -->