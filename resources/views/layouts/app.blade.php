<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTanaLog - @yield('title') </title>
    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />
</head>
<body>
    <div id="wrapper">
        @include('layouts.navigation')
        <div id="page-wrapper" class="gray-bg">
            @include('layouts.topnavbar')
            @yield('content')
            @include('layouts.footer')
        </div>
    </div>
    <script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
    @section('scripts')
    @show
</body>
</html>
