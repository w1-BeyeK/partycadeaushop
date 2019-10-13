@extends("layouts.base")

@section("viewcontent")
@include("layouts.navbar")
<!-- Main Container -->
<div class="main-container container-fluid">
    <!-- Page Container -->
    <div class="page-container">
    @section("nav")
        @include("layouts.menu")
        {{--@include("layouts.chatbar")--}}
    @stop
    @yield("nav")
    <!-- Page Content -->
        <div class="page-content">
            @yield("content")
        </div>
        <!-- /Page Content -->
    </div>
    <!-- /Page Container -->
    <!-- Main Container -->

</div>
@stop

@section("basejs")
    <script src="/beyondadmin/js/toastr/toastr.min.js"></script>
    <script>
        toastr.options = {
            "positionClass": "toast-top-right",
            "onclick": null,
            "fadeIn": 300,
            "fadeOut": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000
        };
        @if(isset($status))
            toastr["{{ $status["type"] }}"]("{{ $status["msg"] }}");
        @endif
    </script>
@stop