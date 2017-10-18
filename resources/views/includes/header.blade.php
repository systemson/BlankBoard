<!-- Logo -->
<a href="index2.html" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>Nu</b>LT</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>Nurse</b>LTE</span>
</a>

<!-- Header Navbar -->
<nav class="navbar navbar-static-top" role="navigation">

  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>

  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">

      <!-- User Account Menu -->
      @if(Auth::check())
      <li class="dropdown user user-menu">

        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <span class="hidden-xs">{{ Auth::user()->name }}</span>
        </a>

        <ul class="dropdown-menu">

          <!-- The user image in the menu -->
          <li class="user-header">
            <img src="{{ URL::asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

            <p>{{ Auth::user()->name }} - Web Developer</p>
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
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </div>
          </li>

        </ul>

      </li>
      @endif

</nav>