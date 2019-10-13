@extends("layouts.app")
@section("content")
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-adjust"></i>
                <a href="/category">Categoriën</a>
            </li>
            <li class="active">
                <i class="fa fa-pencil"></i>
                <a href="/category/update/1">Update</a>
            </li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Categorie update
            </h1>
        </div>
        @include("layouts.extra-buttons")
    </div>
    <!-- /Page Header -->
    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="widget">
                    <div class="widget-header bordered-bottom bordered-blue">
                        <span class="widget-caption">Categorie updaten</span>
                    </div>
                    <div class="widget-body">
                        <div>
                            <form role="form" method="post" action="/admin/category/update/{{ $category->id }}">
                                @csrf
                                <div class="form-group">
                                    <label for="category">Categorie</label>
                                    <input type="text" class="form-control" id="category" name="category" placeholder="Categorie..." value="{{ $category->value }}" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" class="inverted" name="in_portfolio" {{ $category->portfolio == 1 ? "checked='checked'" : "" }}>
                                        <span class="text">Portfolio</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-blue">Opslaan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Body -->
@stop