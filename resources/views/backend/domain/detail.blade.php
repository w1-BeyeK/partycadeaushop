@extends("layouts.app")

@section("css")
    <!--Page Related styles-->
    <link href="/beyondadmin/css/dataTables.bootstrap.css" rel="stylesheet"/>
    <style>
        .dd {
            max-width: 100%;
        }
    </style>
@stop

@section("content")

    <div class="page-breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="fa fa-adjust"></i>
                <a href="/domain">Domein</a>
            </li>
            <li class="active">
                <i class="fa fa-street-view"></i>
                <a href="/domain/{{$domain->domain_id}}">{{ $domain->name }}</a>
            </li>
        </ul>
    </div>

    <div class="page-header position-relative">
        <div class="header-title">
            <h1>
                Domein detail
            </h1>
        </div>
        @include("layouts.extra-buttons")
    </div>

    <!-- /Page Header -->
    <!-- Page Body -->
    <div class="page-body">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-container">
                    <div class="profile-header row">
                        <div class="col-lg-5 col-md-8 col-sm-12 profile-info">
                            <div class="col-md-offset-2">
                                <div class="header-fullname">{{ $domain->name }}</div>
                                <a href="/domain/update/{{$domain->domain_id}}"
                                   class="btn btn-palegreen btn-sm  btn-follow">
                                    <i class="fa fa-pencil"></i>
                                    Edit
                                </a>
                            </div>
                        </div>
                        <div class="text-center col-md-offset-6" style="margin-top:40px;">
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                    <div class="profile-body">
                        <div class="col-lg-12">
                            <div class="tabbable">
                                <ul class="nav nav-tabs tabs-flat  nav-justified" id="myTab11">
                                    <li class="tab-blue">
                                        <a data-toggle="tab" href="#general">
                                            Algemeen
                                        </a>
                                    </li>
                                    <li class="tab-red active">
                                        <a data-toggle="tab" href="#menu">
                                            Menu
                                        </a>
                                    </li>
                                    <li class="tab-palegreen">
                                        <a data-toggle="tab" href="#">
                                            n/a
                                        </a>
                                    </li>
                                    <li class="tab-yellow">
                                        <a data-toggle="tab" href="#">
                                            n/a
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content tabs-flat">
                                    <div id="general" class="tab-pane">
                                        <div class="row profile-overview">
                                            <div class="col-md-12" style="text-align:center;">
                                                <div class="col-md-6">
                                                    <p>Name</p>
                                                    <hr>
                                                    <p>Url</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p>{{ $domain->name }}</p>
                                                    <hr>
                                                    <p>{{ $domain->base_url }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="menu" class="tab-pane active">
                                        <div class="row profile-overview" style="margin: 5px">
                                            <div class="row margin-bottom-20">
                                                <div class="col-md-12">
                                                    <button class="btn btn-primary" id="addButton"><i
                                                                class="fa fa-plus"></i> Add
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="dd dd-draghandle darker">
                                                <ol class="dd-list">
                                                    @foreach ($domain->menuItems() as $menuItem)
                                                        <li class="dd-item dd2-item"
                                                            data-id="{{ $menuItem->menu_item_id }}">
                                                            <div class="dd-handle dd2-handle">
                                                                <i class="normal-icon fa fa-sitemap"></i>

                                                                <i class="drag-icon fa fa-arrows-alt "></i>
                                                            </div>
                                                            <div class="dd2-content">{{ $menuItem->title }}
                                                                <div style="float:right;">
                                                                    <a href="#" class="edit"><i
                                                                                class="fa fa-pencil"></i></a>
                                                                    <a href="#" class="confirm"
                                                                       data-action="/ajax/menu/{{ $menuItem->menu_item_id }}/delete"
                                                                       data-msg="Weet je zeker dat je dit menu item inclusief onderliggende items wilt verwijderen?"><i
                                                                                class="fa fa-trash"></i></a>
                                                                </div>
                                                            </div>
                                                            <ol class="dd-list" style="">
                                                                @foreach($menuItem->children() as $child)
                                                                    <li class="dd-item dd2-item"
                                                                        data-id="{{ $child->menu_item_id }}">
                                                                        <div class="dd-handle dd2-handle">
                                                                            <i class="normal-icon fa fa-sitemap"></i>

                                                                            <i class="drag-icon fa fa-arrows-alt "></i>
                                                                        </div>
                                                                        <div class="dd2-content">{{ $child->title }}
                                                                            <div style="float:right;">
                                                                                <a href="#" class="edit"><i
                                                                                            class="fa fa-pencil"></i></a>
                                                                                <a href="#" class="confirm"
                                                                                   data-action="/ajax/menu/{{ $child->menu_item_id }}/delete"
                                                                                   data-msg="Weet je zeker dat je dit menu item inclusief onderliggende items wilt verwijderen?"><i
                                                                                            class="fa fa-trash"></i></a>
                                                                            </div>
                                                                        </div>
                                                                        <ol class="dd-list">
                                                                            @foreach($child->children() as $child_item)

                                                                                <li class="dd-item dd2-item"
                                                                                    data-id="{{ $child_item->menu_item_id }}">
                                                                                    <div class="dd-handle dd2-handle">
                                                                                        <i class="normal-icon fa fa-sitemap"></i>

                                                                                        <i class="drag-icon fa fa-arrows-alt "></i>
                                                                                    </div>
                                                                                    <div class="dd2-content">
                                                                                        {{ $child_item->title }}
                                                                                        <div style="float:right;">
                                                                                            <a href="#" class="edit"><i
                                                                                                        class="fa fa-pencil"></i></a>
                                                                                            <a href="#" class="confirm"
                                                                                               data-action="/ajax/menu/{{ $child_item->menu_item_id }}/delete"
                                                                                               data-msg="Weet je zeker dat je dit menu item inclusief onderliggende items wilt verwijderen?"><i
                                                                                                        class="fa fa-trash"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                            @endforeach

                                                                        </ol>
                                                                    </li>
                                                                @endforeach
                                                            </ol>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include("backend.domain.menuitem")
@stop
@section("js")
    <!--Page Related Scripts-->
    <script src="/beyondadmin/js/datatable/jquery.dataTables.min.js"></script>
    <script src="/beyondadmin/js/datatable/ZeroClipboard.js"></script>
    <script src="/beyondadmin/js/datatable/dataTables.tableTools.min.js"></script>
    <script src="/beyondadmin/js/datatable/dataTables.bootstrap.min.js"></script>

    <script src="/beyondadmin/js/nestable/jquery.nestable.min.js"></script>
    <script src="/js/menuitem.js"></script>
    <script>
        jQuery(function ($) {
            $('.dd').nestable({
                group: 999,
                maxDepth: 3,
            });
            $('.dd-handle a').on('mousedown', function (e) {
                e.stopPropagation();
            });
        });

        $(".edit").on("click", function (e) {
            e.preventDefault();
            var id = $(this.closest(".dd2-item")).data("id");

            showEditModal(id);
        });

        $(".confirm").on("click", function (e) {
            e.preventDefault();
            let msg = $(this).data("msg");
            let action = $(this).data("action");
            if (confirm(msg)) {
                $.ajax({
                    url: action,
                    type: "POST",
                    success: function () {
                        location.reload();
                    }
                })
            }
        });

        $('.dd').on('change', function () {
            var data = $(".dd").nestable("serialize");
            $.ajax({
                url: "/ajax/menu/{{ $domain->domain_id }}/updatemenu",
                type: "POST",
                data: {
                    menu: data
                },
                error: function () {
                    console.log("Something went wrong...");
                }
            })
        });

        $("#addButton").on("click", function () {
            $.ajax({
                url: "/ajax/menu/{{ $domain->domain_id }}/add",
                type: "POST",
                success: function () {
                    location.reload();
                }
            })
        });

    </script>
@stop