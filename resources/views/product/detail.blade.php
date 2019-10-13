@extends("layouts.app")

@section("content")
<!-- Page Breadcrumb -->
<div class="page-breadcrumbs">
    <ul class="breadcrumb">
        <li class="active">
            <i class="fa fa-adjust"></i>
            <a href="/product">Product</a>
        </li>
        <li>
            <i class="fa fa-eye"></i>
            <a href="/product/{{ $product->id }}">Details</a>
        </li>
    </ul>
</div>
<!-- /Page Breadcrumb -->
<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            Product details
        </h1>
    </div>
    @include("layouts.extra-buttons")
</div>
<!-- /Page Header -->
<!-- Page Body -->
<div class="page-body">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-container">
                <div class="profile-header row">
                    <div class="col-lg-2 col-md-4 col-sm-12 text-center">
                        <img src="assets/img/avatars/divyia.jpg" alt="" class="header-avatar" />
                    </div>
                    <div class="col-lg-5 col-md-8 col-sm-12 profile-info">
                        <div class="header-fullname">Kim Ryder</div>
                        <a href="#" class="btn btn-palegreen btn-sm  btn-follow">
                            <i class="fa fa-check"></i>
                            Following
                        </a>
                        <div class="header-information">
                            Kim is a software developer in Microsoft. She works in ASP.NET MVC Team and collaborates with other teams.
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 profile-stats">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 stats-col">
                                <div class="stats-value pink">284</div>
                                <div class="stats-title">FOLLOWING</div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 stats-col">
                                <div class="stats-value pink">803</div>
                                <div class="stats-title">FOLLOWERS</div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 stats-col">
                                <div class="stats-value pink">1207</div>
                                <div class="stats-title">POSTS</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 inlinestats-col">
                                <i class="glyphicon glyphicon-map-marker"></i> Boston
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 inlinestats-col">
                                Rate: <strong>$250</strong>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 inlinestats-col">
                                Age: <strong>24</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-body">
                    <div class="col-lg-12">
                        <div class="tabbable">
                            <ul class="nav nav-tabs tabs-flat  nav-justified" id="myTab11">
                                <li class="active">
                                    <a data-toggle="tab" href="#overview">
                                        Overzicht
                                    </a>
                                </li>
                                <li class="tab-red">
                                    <a data-toggle="tab" href="#photos">
                                        Fotos
                                    </a>
                                </li>
                                <li class="tab-palegreen">
                                    <a data-toggle="tab" id="contacttab" href="#articles">
                                        Artikelen
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content tabs-flat">
                                <div id="overview" class="tab-pane active">
                                    <h1>Hoi</h1>
                                </div>
                                <div id="photos" class="tab-pane">
                                    <h1>Fotos</h1>
                                </div>
                                <div id="articles" class="tab-pane">
                                    <h1>Artikelen</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Page Body -->
@stop

@section("js")
<!--Page Related Scripts-->
<script src="/beyondadmin/js/datatable/jquery.dataTables.min.js"></script>
<script src="/beyondadmin/js/datatable/ZeroClipboard.js"></script>
<script src="/beyondadmin/js/datatable/dataTables.tableTools.min.js"></script>
<script src="/beyondadmin/js/datatable/dataTables.bootstrap.min.js"></script>
<script>

</script>
@stop