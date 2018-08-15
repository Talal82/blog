<!doctype html>
<html lang="en">
  <head>
    @include('partials._head')

    @yield('stylesheets')
  </head>
  <body>
    @include('partials._nav')

    <div class="container">
      @include('partials._messages')

      @Yield('content')
    </div>

    <hr>

    @include('partials._footer')

    @include('partials._javascript')

    @yield('scripts')
  </body>
</html>