<!-- Logo -->
<a href="{{ route('dashboard.index') }}" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>DD</b>u</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>{{ config('app.name') }}</b></span>
</a>

<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">

  @auth
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
  @endauth

  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

      @auth
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="hidden-xs">{{ Auth::user()->name }}</span>
          </a>

          <ul class="dropdown-menu">

            <li class="user-header">
              <!-- The user image in the menu -->
              <img src="{{ URL::asset(Auth::image()) }}" class="img-circle" alt="User Image">

              <!-- The user name and roles in the menu -->
              <p>{{ Auth::name() }} - {{ Auth::user()->roles->implode('name', ', ') }}.</p>
            </li>

            <!-- Menu Body -->
            <li class="user-body">
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{ route('users.show', Auth::user()->id) }}" class="btn btn-default btn-flat">Profile</a>
              </div>

              <div class="pull-right">
                <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                {{ Form::open(array(
                  'url' => route('logout'),
                  'method' => 'POST',
                  'style' => 'display: none;',
                  'id' => 'logout-form'))
                }}
                {{ Form::close() }}

              </div>
            </li>
            <!-- /. menu footer-->

          </ul>

        </li>
        <!-- /. user account menu -->
      @endauth

    </ul>
  </div>
  <!-- /. navbar right menu -->

</nav>
