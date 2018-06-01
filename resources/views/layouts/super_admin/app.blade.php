@include('layouts.super_admin.header')
@guest
    @yield('content')
@else
    @include('layouts.super_admin.menu')
    @yield('style')
    <div id="main" role="main">
      @include('layouts.super_admin.ribbon')
      @yield('content')
    </div>
@endguest
@include('layouts.super_admin.footer')
@yield('script')
</body>
</html>
