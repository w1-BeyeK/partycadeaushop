@extends("layouts.app")
@section("content")
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-adjust"></i>
                <a href="/category">Categorie</a>
            </li>
            <li class="active">
                <i class="fa fa-plus"></i>
                <a href="/category/create">Toevoegen</a>
            </li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Categorie toevoegen
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
                        <span class="widget-caption">Nieuwe categorie</span>
                    </div>
                    <div class="widget-body">
                        <div>
                            <form role="form" method="post" action="/admin/category/create">
                                @csrf
                                <div class="form-group">
                                    <label for="category">Categorie</label>
                                    <input type="text" class="form-control" id="category" name="category" placeholder="Categorie..." required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" class="inverted" name="in_portfolio">
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