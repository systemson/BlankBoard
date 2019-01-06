<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('front.includes.head')
  @yield('styles')
</head>
<body>
<div class="container">
  @yield('content')
  @include('front.includes.footer')
</div>

<!-- scripts -->
@include('front.includes.scripts')
@yield('scripts')
</body>
</html>
