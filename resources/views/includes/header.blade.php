<!-- Logo -->
<a href="{{ route('dashboard.index') }}" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>BB</b></span>
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
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            @if (Auth::user()->unreadEmails()->count() > 0)
              <span class="label label-success">
                {{ Auth::user()->unreadEmails()->count() }}
              </span>
            @endif
          </a>
          <ul class="dropdown-menu">
            <li class="header">{{ trans_choice('emails.unread-messages', Auth::user()->unreadEmails()->count()) }}</li>
            <li>
              <ul class="menu">
                @include('includes.tables.header_emails')
              </ul>
            </li>
            <li class="footer">
              <a href="{{ route('emails.index') }}">{{ __('emails.open-inbox') }}</a>
            </li>
          </ul>
        </li>

        <!-- User Account Menu -->
        <li class="dropdown user user-menu">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ URL::asset(Auth::image()) }}" class="user-image">
            <span class="hidden-xs">{{ Auth::user()->name }}</span>
          </a>

          <ul class="dropdown-menu">

            <li class="user-header">
              <!-- The user image in the menu -->
              <img src="{{ URL::asset(Auth::image()) }}" class="img-circle" style="object-fit: cover;" alt="User Image">

              <!-- The user name and roles in the menu -->
              <p>{{ Auth::name() }}</p>
            </li>

            <!-- Menu Body -->
            <li class="user-body">
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{ route('users.show', Auth::user()->id) }}" class="btn btn-{{ __('messages.btn.profile.class') }} btn-flat">{{ __('messages.btn.profile.name') }}</a>
              </div>

              <div class="pull-right">
                <a href="{{ route('logout') }}" class="btn btn-{{ __('messages.btn.logout.class') }} btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('messages.btn.logout.name') }}</a>
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
      @guest
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="hidden-xs">Menu</span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <ul class="menu">
                <div class="col-sm-12 text-center text-nowrap">
                  <a class="btn btn-success" href="{{ route('login') }}" >Login</a>
                  <a class="btn btn-default" href="{{ route('register') }}" >Register</a>
                </div>
              </ul>
            </li>
          </ul>
        </li>
      @endguest

    </ul>
  </div>
  <!-- /. navbar right menu -->

</nav>
