<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        {{ config('app.name') }} | @yield('title')
    </title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @stack('css')
    <script src="{{ mix('/js/app.js') }}"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @stack('scriptTop')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
@guest 
    @yield('content') 
@else
<div class="wrapper" id="app">
    <!-- NavBar -->
    @include('layouts.components.navbar')
    <!-- SideBar -->
    @include('layouts.components.sidebar')
    <!-- Contents -->
    @include('layouts.components.contents')
    <!-- Footer -->
    @include('layouts.components.footer')
</div><!-- ./wrapper -->
@endguest
@stack('scriptBottom')
</body>
</html>
