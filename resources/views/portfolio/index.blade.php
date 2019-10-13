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
                <a href="/category">Categoriën</a>
            </li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Portfolio items
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
                        <span class="widget-caption">Items</span>
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
                        <a href="/admin/portfolio/create" class="btn btn-primary" style="margin-bottom:10px;">Nieuw</a>
                        <table class="table table-striped table-bordered table-hover" id="categoryDataTable">
                            <thead>
                            <tr>
                                <th width="200px">Foto</th>
                                <th>
                                    Titel
                                </th>
                                <th>
                                    Omschrijving
                                </th>
                                <th width="100px;">Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($portfolio_items as $item)
                                    <tr>
                                        <td><img width="200px" height="auto" src="/storage/portfolio/{{$item->image}}"/></td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            <a href="/admin/portfolio/update/{{ $item->id }}"><i class="fa fa-pencil"></i></a> |
                                            <a href="#" class="confirm" data-action="/admin/portfolio/delete/{{ $item->id }}" data-msg="Weet je zeker dat je dit item wilt verwijderen?"><i class="fa fa-trash"></i></a>
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
                        "bSortable": false,
                    },
                    {
                        "bSortable": true,
                    },
                    {
                        "bSortable": true
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