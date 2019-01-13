<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('front.includes.head')
  @yield('styles')
</head>
<body style="margin: 0 0 60px;">

  @include('front.includes.menu')

  @yield('content')

  @include('front.includes.footer')

  <!-- scripts -->
  @include('front.includes.scripts')
  @yield('scripts')
</body>
</html>
