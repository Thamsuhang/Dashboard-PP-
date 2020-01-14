@include('backend.layouts.header')
@include('backend.layouts.footer')
@include('backend.layouts.sidebar')
@include('backend.layouts.topnav')

@yield('header')
@yield('topnav')

@yield('sidebar')
@yield('content')
@yield('footer')