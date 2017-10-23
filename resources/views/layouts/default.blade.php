<!doctype html>
<html>
<head>
  @include('includes.head')
</head>
<body class="hold-transition skin-blue @auth sidebar-mini @else sidebar-collapse @endguest">

<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
    @include('includes.header')
  </header>
  <!-- /. main header -->

  @auth
  <!-- /. sidebar -->
  <aside class="main-sidebar">
    @include('includes.sidebar')
  </aside>
  <!-- /. sidebar -->
  @endauth

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if (session('info'))
    <br>
    <div class="col-sm-12">
      <div class="alert alert-info alert-dismissable fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">
          <i class="fa fa-close"></i>
        </a>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        {{ session('info') }}
      </div>
    </div>
    @endif

    @yield('content')
  </div>
  <!-- /. content wrapper -->

  <!-- footer -->
  <footer class="main-footer">
    @include('includes.footer')
  </footer>
  <!-- ./ footer -->

</div>
<!-- ./wrapper -->

<!-- scripts -->
@include('includes.scripts')

</body>
</html>
