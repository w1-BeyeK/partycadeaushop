<!-- Page Sidebar -->
<div class="page-sidebar" id="sidebar">
    <!-- Page Sidebar Header-->
    {{--<div class="sidebar-header-wrapper">--}}
        {{--<input type="text" class="searchinput" />--}}
        {{--<i class="searchicon fa fa-search"></i>--}}
        {{--<div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>--}}
    {{--</div>--}}
    <!-- /Page Sidebar Header -->
    <!-- Sidebar Menu -->
    <ul class="nav sidebar-menu">
        <!--Dashboard-->
        <li class="@if($active == "dashboard") active @endif">
            <a href="/admin/dashboard">
                <i class="menu-icon fa fa-dashboard"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
        </li>
        <!--Customers-->
        <li class="@if($active == "customer") active @endif">
            <a href="/admin/customer">
                <i class="menu-icon fa fa-child"></i>
                <span class="menu-text"> Klanten </span>
            </a>
        </li>
        <!--Products-->
        <li class="@if($active == "product") active @endif">
            <a href="/admin/product">
                <i class="menu-icon fa fa-barcode"></i>
                <span class="menu-text"> Producten </span>
            </a>
        </li>
        <!--Categories-->
        <li class="@if($active == "category") active @endif">
            <a href="/admin/category">
                <i class="menu-icon fa fa-adjust"></i>
                <span class="menu-text"> Categoriën </span>
            </a>
        </li>
        <!--Orders-->
        <li class="@if($active == "order") active @endif">
            <a href="/admin/order">
                <i class="menu-icon fa fa-book"></i>
                <span class="menu-text"> Orders </span>
            </a>
        </li>
        <!--Portfolio-->
        <li class="@if($active == "portfolio") active @endif">
            <a href="/admin/portfolio">
                <i class="menu-icon fa fa-behance"></i>
                <span class="menu-text"> Portfolio</span>
            </a>
        </li>
        <!--Domains-->
        <li class="@if($active == "domain") active @endif">
            <a href="/admin/domain">
                <i class="menu-icon fa fa-street-view"></i>
                <span class="menu-text"> Domeinen</span>
            </a>
        </li>
    </ul>
    <!-- /Sidebar Menu -->
</div>
<!-- /Page Sidebar -->