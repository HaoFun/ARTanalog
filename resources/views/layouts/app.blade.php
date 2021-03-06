<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTanaLog - @yield('title') </title>
    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/sweetalert.css') !!}" />
    @yield('css')
</head>
<body>
    <div id="wrapper">
        @include('layouts.navigation')
        <div id="page-wrapper" class="gray-bg">
            @include('layouts.topnavbar')
            @include('flash::message')
            @yield('content')
            @include('layouts.footer')
        </div>
    </div>
    <script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('js/sweetalert.min.js') !!}" type="text/javascript"></script>
    <script>
        function ConfirmDelete(node) {
            swal({
                    title: "確認要刪除嗎?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#1ab394",
                    confirmButtonText: "刪除",
                    cancelButtonText: "取消",
                    closeOnConfirm: true
                },
                function() {
                    node.parentNode.submit();
                });
        }
    </script>
    @section('scripts')
    @show
</body>
</html>
