@extends("layouts.app")

@section("css")
    <!--Page Related styles-->
    <link href="/beyondadmin/css/dataTables.bootstrap.css" rel="stylesheet" />
@stop

@section("content")
    <!-- Page Breadcrumb -->
    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li class="active">
                <i class="fa fa-adjust"></i>
                <a href="/admin/category">Categoriën</a>
            </li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Categoriënoverzicht
            </h1>
        </div>
        @include("layouts.extra-buttons")
    </div>
    <!-- /Page Header -->
    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div class="widget">
                    <div class="widget-header ">
                        <span class="widget-caption">Categoriën</span>
                        <div class="widget-buttons">
                            <a href="#" data-toggle="maximize">
                                <i class="fa fa-expand"></i>
                            </a>
                            <a href="#" data-toggle="collapse">
                                <i class="fa fa-minus"></i>
                            </a>
                            <a href="#" data-toggle="dispose">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="widget-body">
                        <a href="/admin/category/create" class="btn btn-primary" style="margin-bottom:10px;">Nieuw</a>
                        <table class="table table-striped table-bordered table-hover" id="categoryDataTable">
                            <thead>
                            <tr>
                                <th>
                                    Categorie
                                </th>
                                <th width="200px">Aangemaakt op</th>
                                <th width="200px">Laatst geüpdate</th>
                                <th width="100px;">Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->value }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td>
                                            <a href="/admin/category/update/{{ $category->id }}"><i class="fa fa-pencil"></i></a> |
                                            <a href="#" class="confirm" data-action="/admin/category/delete/{{ $category->id }}" data-msg="Weet je zeker dat je deze categorie wilt verwijderen?"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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

        $(".confirm").on("click", function(e) {
            e.preventDefault();
            let msg = $(this).data("msg");
            let action = $(this).data("action");
            if(confirm(msg)) {
                window.location.href = window.location.origin + action;
            }
        });

        $(document).ready(function() {
            $('#categoryDataTable').dataTable({
                "iDisplayLength": 10,
                "sDom": "Tflt<'row DTTTFooter'<'col-sm-6'i><'col-sm-6'p>>",
                "oTableTools": {
                    "aButtons": [
                        "copy", "csv", "xls", "pdf", "print"
                    ],
                    "sSwfPath": "assets/swf/copy_csv_xls_pdf.swf"
                },
                "aoColumns": [
                    {
                        "bSortable": true,
                    },
                    {
                        "bSortable": false,
                        "width": "100px"
                    }
                ],
                "language": {
                    "sLengthMenu": "_MENU_",
                    "zeroRecords": "Niks gevonden - sorry",
                    "search": "",
                    "info": "Pagina _PAGE_ van _PAGES_",
                    "infoEmpty": "Geen data beschikbaar",
                    "infoFiltered": "(_TOTAL_ gefilterd van _MAX_ records)",
                    "oPaginate": {
                        "sPrevious": "Vorige",
                        "sNext": "Volgende"
                    }
                },
            });
        });
    </script>
@stop