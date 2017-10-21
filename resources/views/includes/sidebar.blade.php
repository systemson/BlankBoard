<!-- Sidebar -->
<section class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      @if (Auth::user()->image)
      <img src="{{ URL::asset(Auth::user()->image) }}" class="img-circle" alt="User Image">
      @else
      <img src="{{ URL::asset('img/avatar/default.png') }}" class="img-circle" alt="User Image">
      @endif
    </div>
    <div class="pull-left info">
      <p>{{ Auth::user()->name }}</p>
      <!-- Status -->
      <small><i class="fa fa-circle text-success"></i> Online</small>
    </div>
  </div>
  <!-- /. sidebar user panel -->

  <!-- Search form (Optional) -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
    </div>
  </form>
  <!-- /.search form -->

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">

    <li class="header">Menu</li>

    <!-- Dashboard Module -->
    <li class="@if (routeNameIs('dashboard.index')) active @endif">
      <a href="{{ URL::route('dashboard.index') }}">
        <i class="fa fa-home"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <!-- /. dashboard module -->

    @if (
      Auth::user()->hasPermission([
        'module_users', 'view_users',
        'module_roles', 'view_roles',
        'module_permissions',  'view_permissions',
      ])
    )
    <!-- Security section -->
    <li class="treeview @if (routeNameIs(['users', 'roles', 'permissions', 'users_config'], true)) menu-open @endif">
      <a href="#"><i class="fa fa-lock"></i> <span>Security</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" @if (routeNameIs(['users', 'roles', 'permissions', 'users_config'], true)) style="display: block;"  @endif>

		@if(Auth::user()->hasPermission(['module_users', 'view_users']))
        <!-- Users module -->
        <li class="@if (routeNameIs('users', true)) active @endif">
          <a href="{{ URL::route('users.index') }}"><i class="fa fa-users"></i><span>Users</span></a>
        </li>
        <!-- /. user module -->
        @endif

        @if(Auth::user()->hasPermission(['module_roles', 'view_roles']))
        <!-- Role module -->
        <li class="@if (routeNameIs('roles', true)) active @endif">
          <a href="{{ URL::route('roles.index') }}"><i class="fa fa-user"></i><span>Roles</span></a>
        </li>
        <!-- /. role module -->
        @endif

        @if(Auth::user()->hasPermission(['module_permissions', 'view_permissions']))
        <!-- Permission module -->
        <li class="@if (routeNameIs('permissions', true)) active @endif">
          <a href="{{ URL::route('permissions.index') }}"><i class="fa fa-user-secret"></i><span>Permissions</span></a>
        </li>
        <!-- /. permission module -->
        @endif


        @if (Auth::user()->hasPermission('module_users/config') && false)
        <!-- Permission module -->
        <li class="@if (routeNameIs('users_config', true)) active @endif">
          <a href="{{ URL::route('users_config.index') }}"><i class="fa fa-cog"></i><span>Users config</span></a>
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
