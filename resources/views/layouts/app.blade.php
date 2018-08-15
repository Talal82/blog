<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials._app_head')
</head>
<body>
    <div id="app">
        @include('partials._app_nav')

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
