@extends("layouts.app")
@section("content")
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-barcode"></i>
                <a href="/product">Producten</a>
            </li>
            <li class="active">
                <i class="fa fa-pencil"></i>
                <a href="/product/update/1">Update</a>
            </li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Product update
            </h1>
        </div>
        @include("layouts.extra-buttons")
    </div>
    <!-- /Page Header -->
    <!-- Page Body -->
    <div class="page-body">
        <h1>HOOOI</h1>
    </div>
    <!-- /Page Body -->
@stop