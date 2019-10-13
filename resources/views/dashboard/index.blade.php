@extends("layouts.app")






@section("content")
<!-- Page Breadcrumb -->
<div class="page-breadcrumbs">
    <ul class="breadcrumb">
        <li class="active">
            <i class="fa fa-dashboard"></i>
            <a href="/dashboard">Dashboard</a>
        </li>
    </ul>
</div>
<!-- /Page Breadcrumb -->
<!-- Page Header -->
<div class="page-header position-relative">
    <div class="header-title">
        <h1>
            Dashboard
        </h1>
    </div>
    @include("layouts.extra-buttons")
</div>
<!-- /Page Header -->
<!-- Page Body -->
<div class="page-body">

</div>
<!-- /Page Body -->
@stop

@section("js")

@endsection