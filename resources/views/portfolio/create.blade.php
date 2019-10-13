@extends("layouts.app")
@section("content")
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-adjust"></i>
                <a href="/admin/portfolio">Portfolio</a>
            </li>
            <li class="active">
                <i class="fa fa-plus"></i>
                <a>Toevoegen</a>
            </li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Portfolio item toevoegen
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
                        <span class="widget-caption">Nieuw portfolio item</span>
                    </div>
                    <div class="widget-body">
                        <div>
                            <form id="form" role="form" method="post" action="/admin/portfolio/create" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Titel</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           placeholder="Titel..." required>
                                </div>
                                <div class="form-group">
                                    <label for="category">Categorie</label>
                                    <select id="category" name="category" style="width:100%;">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"/>
                                            {{ $category->value }}
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="picture">Foto</label>
                                    <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <span class="btn btn-azure btn-file">
                                                            Browse <input type="file" name="picture" accept="image/*">
                                                        </span>
                                                    </span>
                                        <input type="text" id="pictureText" class="form-control" readonly="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title">Url</label>
                                    <input type="url" class="form-control" id="url" name="url"
                                           placeholder="Url...">
                                </div>
                                <div class="form-group">
                                    <label for="keywords" class="control-label">Keywords</label>
                                    <input type="text" class="form-control" name="keywords" placeholder="Keywords..." required/>
                                </div>
                                <div class="form-group">
                                    <label for="description">Omschrijving (extra)</label>
                                    <textarea class="form-control" rows="3" id="description" name="description"></textarea>
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

@section("js")
    <script>
        // Init form
        var initForm = $(function() {
            $("#form select").select2();

            $("#form input[type='file']").on("change", function (e) {
                var fLength = e.currentTarget.files.length;
                if (fLength > 0) {
                    $("#pictureText").val(e.currentTarget.files[fLength - 1].name);
                }
            })
        });
    </script>
@stop