<!doctype html>
<html>
<head>
  @include('admin.includes.head')
  @yield('styles')
</head>
<body class="hold-transition skin-blue @auth sidebar-mini @else sidebar-collapse @endguest">

  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">
      @include('admin.includes.header')
    </header>
    <!-- /. main header -->

    @auth
    <!-- /. sidebar -->
    <aside class="main-sidebar">
      @include('admin.includes.sidebar')
    </aside>
    <!-- /. sidebar -->
    @endauth

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      @yield('content-header')

      <!-- Main content -->
      <section class="content container-fluid">
        <div class="col-sm-12">
          <div class="row">

            <div class="col-sm-12">
              @include('admin.includes.alerts')
            </div>

            @yield('content')

          </div>
        </div>
      </section><!-- /.content -->
    </div>
    <!-- /. content wrapper -->

    <!-- footer -->
    <footer class="main-footer">
      @include('admin.includes.footer')
    </footer>
    <!-- ./ footer -->

  </div>
  <!-- ./wrapper -->

  <!-- scripts -->
  @include('admin.includes.scripts')
  @yield('scripts')

</body>
</html>
