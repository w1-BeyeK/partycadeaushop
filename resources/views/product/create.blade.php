@extends("layouts.app")
@section("content")
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-barcode"></i>
                <a href="/product">Product</a>
            </li>
            <li class="active">
                <i class="fa fa-plus"></i>
                <a href="/product/create">Toevoegen</a>
            </li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Product toevoegen
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