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
                <i class="fa fa-barcode"></i>
                <a href="/product">Producten</a>
            </li>
        </ul>
    </div>
    <!-- /Page Breadcrumb -->
    <!-- Page Header -->
    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Product overzicht
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
                        <span class="widget-caption">Producten</span>
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
                        <table class="table table-striped table-bordered table-hover" id="productTable">
                            <thead>
                            <tr>
                                <th>
                                    Naam
                                </th>
                                <th>
                                    Categorie
                                </th>
                                <th>
                                    Gewicht
                                </th>
                                <th>
                                    Prijs
                                </th>
                                <th>
                                    Acties
                                </th>
                                <th>Voorraad</th>
                                <th>Omschrijving</th>
                                <th>Foto</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category->value }}</td>
                                        <td>{{ $product->weight }}g</td>
                                        <td>€{{ $product->price }}</td>
                                        <td>
                                            <a href="/product/{{ $product->id }}"><i class="fa fa-eye"></i></a> |
                                            <a href="/product/update/{{ $product->id }}"><i class="fa fa-pencil"></i></a> |
                                            <a href="#" class="confirm" data-action="/product/delete/{{ $product->id }}" data-msg="Weet je zeker dat je dit product wilt verwijderen?"><i class="fa fa-trash"></i></a>
                                        </td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->primaryImage()->url }}</td>
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

        var InitiateProductTable = function() {
            return {
                init: function() {
                    /* Formatting function for row details */
                    function fnFormatDetails(oTable, nTr) {
                        var aData = oTable.fnGetData(nTr);
                        var sOut = '<table>';
                        sOut += '<tr><td rowspan="6" style="padding:0 10px 0 0;"><img src="' + aData[8] + '"/></td><td>Naam:</td><td>' + aData[1] + '</td></tr>';
                        sOut += '<tr><td>Omschrijving:</td><td>' + aData[7] + '</td></tr>';
                        sOut += '<tr><td>Categorie:</td><td>' + aData[2] + '</td></tr>';
                        sOut += '<tr><td>Gewicht:</td><td>' + aData[3] + '</td></tr>';
                        sOut += '<tr><td>Prijs:</td><td>' + aData[4] + '</td></tr>';
                        sOut += '<tr><td>Voorraad:</td><td>' + aData[6] + ' stuks</td></tr>';
                        sOut += '</table>';
                        return sOut;
                    }

                    /*
                     * Insert a 'details' column to the table
                     */
                    var nCloneTh = document.createElement('th');
                    var nCloneTd = document.createElement('td');
                    nCloneTd.innerHTML = '<i class="fa fa-plus-square-o row-details"></i>';

                    $('#productTable thead tr').each(function() {
                        this.insertBefore(nCloneTh, this.childNodes[0]);
                    });

                    $('#productTable tbody tr').each(function() {
                        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
                    });

                    /*
                     * Initialize DataTables, with no sorting on the 'details' column
                     */
                    var oTable = $('#productTable').dataTable({
                        "sDom": "Tflt<'row DTTTFooter'<'col-sm-6'i><'col-sm-6'p>>",
                        "aoColumnDefs": [
                            { "bVisible": false, "aTargets": [6, 7, 8] }
                        ],
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


                    $('#productTable').on('click', ' tbody td .row-details', function() {
                        var nTr = $(this).parents('tr')[0];
                        if (oTable.fnIsOpen(nTr)) {
                            /* This row is already open - close it */
                            $(this).addClass("fa-plus-square-o").removeClass("fa-minus-square-o");
                            oTable.fnClose(nTr);
                        } else {
                            /* Open this row */
                            $(this).addClass("fa-minus-square-o").removeClass("fa-plus-square-o");;
                            oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
                        }
                    });

                    $('#productTable_column_toggler input[type="checkbox"]').change(function() {
                        var iCol = parseInt($(this).attr("data-column"));
                        var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
                        oTable.fnSetColumnVis(iCol, (bVis ? false : true));
                    });

                    $('body').on('click', '.dropdown-menu.hold-on-click', function(e) {
                        e.stopPropagation();
                    });
                }
            };
        }();
        InitiateProductTable.init();
    </script>
@stop