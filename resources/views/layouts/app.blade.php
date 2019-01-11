<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('front.includes.head')
  @yield('styles')
</head>
<body style="margin: 0 0 60px;">

@include('front.includes.menu')

<div class="container">

	<div class="row">
  		@yield('content')
	</div>

</div>

@include('front.includes.footer')

<!-- scripts -->
@include('front.includes.scripts')
@yield('scripts')
</body>
</html>
