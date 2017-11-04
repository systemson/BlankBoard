<!-- Sidebar -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <a href="{{ route('users.show', Auth::user()->id) }}" title="{{ __('auth.profile') }}">
    <div class="user-panel">

      <!-- Avatar -->
      <div class="pull-left image">
        <img src="{{ URL::asset(Auth::image()) }}" class="img-circle" alt="{{ Auth::name() }}">
      </div>

      <div class="pull-left info">

        <!-- Name -->
        <p class="text-center">{{ Auth::name() }}</p>

        <!-- Status -->
        <small>
          <span class="{{ __('messages.status.' . Auth::user()->status . '.class') }}">
          {{ __('messages.status.' . Auth::user()->status . '.name') }}
          </span>
        </small>

      </div>
    </div>
    </a>
  <!-- /. sidebar user panel -->

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">

    <li class="header">Menu</li>

    <!-- Dashboard Module -->
    <li class="@if (routeNameIs('dashboard.index')) active @endif">
      <a href="{{ URL::route('dashboard.index') }}">
        <i class="fa fa-home"></i>
        <span>{{ __('dashboard.title') }}</span>
      </a>
    </li>
    <!-- /. dashboard module -->

    @if (Auth::user()->hasPermission('Users|Roles|Permissions', true))
    <!-- Security section -->
    <li class="treeview @if (routeNameIs(['users', 'roles', 'permissions', 'users_config'], true) || routeNameIs(['users.config'])) menu-open @endif">
      <a href="#"><i class="fa fa-lock"></i> <span>Security</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" @if (routeNameIs(['users', 'roles', 'permissions', 'users_config'], true) || routeNameIs(['users.config'])) style="display: block;"  @endif>

		@if (Auth::user()->hasPermission('Users', true))
        <!-- Users module -->
        <li class="@if (routeNameIs('users', true) || routeNameIs(['users.config'])) active @endif">
          <a href="{{ URL::route('users.index') }}"><i class="fa fa-users"></i> <span>{{ __('users.title') }}</span></a>
        </li>
        <!-- /. user module -->
        @endif

        @if (Auth::user()->hasPermission('Roles', true))
        <!-- Role module -->
        <li class="@if (routeNameIs('roles', true)) active @endif">
          <a href="{{ URL::route('roles.index') }}"><i class="fa fa-user"></i><span>{{ __('roles.title') }}</span></a>
        </li>
        <!-- /. role module -->
        @endif

        @if (Auth::user()->hasPermission('Permissions', true))
        <!-- Permission module -->
        <li class="@if (routeNameIs('permissions', true)) active @endif">
          <a href="{{ URL::route('permissions.index') }}"><i class="fa fa-user-secret"></i><span>{{ __('permissions.title') }}</span></a>
        </li>
        <!-- /. permission module -->
        @endif

     </ul>
    </li>
    @endif
    <!-- /. security section -->

  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
