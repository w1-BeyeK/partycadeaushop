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
                <i class="fa fa-street-view"></i>
                <a href="/domain">Domeinen</a>
            </li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Domeinen
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
                        <span class="widget-caption">Domeinen</span>
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
                        <table class="table table-striped table-bordered table-hover" id="domainTable">
                            <thead>
                            <tr>
                                <th>
                                    Naam
                                </th>
                                <th>
                                    Acties
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($domains as $domain)
                                <tr>
                                    <td>{{ $domain->name }}</td>
                                    <td>
                                        <a href="/admin/domain/{{ $domain->domain_id }}"><i class="fa fa-eye"></i></a>
                                        {{--|--}}
                                        {{--<a href="/admin/domain/update/{{ $domain->domain_id  }}"><i class="fa fa-pencil"></i></a> |--}}
                                        {{--<a href="#" class="confirm" data-action="/admin/domain/delete/{{ $domain->domain_id }}" data-msg="Weet je zeker dat je dit domein wilt verwijderen?"><i class="fa fa-trash"></i></a>--}}
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
        $(".confirm").on("click", function() {
            let msg = $(this).data("msg");
            let action = $(this).data("action");
            if(confirm(msg)) {
                window.location.href = window.location.origin + action;
            }
        });

        var InitiateDomainTable = function() {
            return {
                init: function() {
                    /*
                     * Initialize DataTables, with no sorting on the 'details' column
                     */
                    var oTable = $('#domainTable').dataTable({
                        "sDom": "Tflt<'row DTTTFooter'<'col-sm-6'i><'col-sm-6'p>>",
                        // "aaSorting": [[0, 'asc']],
                        "aLengthMenu": [
                            [5, 15, 20, -1],
                            [5, 15, 20, "All"]
                        ],
                        "iDisplayLength": 20,
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
                }
            };
        }();
        InitiateDomainTable.init();
    </script>
@stop