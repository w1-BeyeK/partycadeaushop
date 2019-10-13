@extends("layouts.app")
@section("content")
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-book"></i>
                <a href="/order">Order</a>
            </li>
            <li class="active">
                <i class="fa fa-pencil"></i>
                <a href="/order/update/1">Update</a>
            </li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Order update
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