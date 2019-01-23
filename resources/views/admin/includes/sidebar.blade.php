<!-- Sidebar -->
<section class="sidebar">

  <!-- Sidebar user panel (optional) -->
  <a href="{{ route('users.show', Auth::user()->id) }}" title="@lang('auth.profile')">
    <div class="user-panel">

      <!-- Avatar -->
      <div class="pull-left image">
        <img src="{{ asset(Auth::image()) }}" class="img-circle" alt="{{ Auth::name() }}">
      </div>

      <div class="pull-left info">

        <!-- Name -->
        <p class="text-center">{{ Auth::name() }}</p>

        <!-- Status -->
        <small>
          <span class="@lang('messages.status.' . Auth::user()->status . '.class')">
            @lang('messages.status.' . Auth::user()->status . '.name')
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
      <a href="{{ route('dashboard.index') }}">
        <i class="fa fa-home"></i>
        <span>@lang('dashboard.title')</span>
      </a>
    </li>
    <!-- /. dashboard module -->

    @if (Auth::user()->isActive() && !Auth::user()->passwordExpired())
    <!-- Mailbox Module -->
    <li class="treeview @if (routeNameIs('emails', true) || routeNameIs(['emails.sent', 'emails.draft', 'emails.trash'])) menu-open @endif">
      <a href="#"><i class="fa fa-envelope"></i> <span>@lang('emails.parent')</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" @if (routeNameIs('emails', true) || routeNameIs(['emails.sent', 'emails.draft', 'emails.trash'])) style="display: block;"  @endif>

        <!-- Inbox -->
        <li class="@if (routeNameIs('emails', true) || routeNameIs('emails.draft')) active @endif">
          <a href="{{ route('emails.index') }}"><i class="fa fa-circle-o"></i><span>@lang('emails.title')</span></a>
        </li>
        <!-- /. inbox -->

        <!-- Sent emails -->
        <li class="@if (routeNameIs('emails.sent')) active @endif">
          <a href="{{ route('emails.sent') }}"><i class="fa fa-circle-o"></i><span>@lang('emails.sent')</span></a>
        </li>
        <!-- /. sent emails -->

        <!-- Trash emails -->
        <li class="@if (routeNameIs('emails.trash')) active @endif">
          <a href="{{ route('emails.trash') }}"><i class="fa fa-circle-o"></i><span>@lang('emails.trash')</span></a>
        </li>
        <!-- /. trash emails -->

      </ul>
    </li>
    <!-- /. mailbox module -->
    @endif

    @permission('Users|Roles|Permissions,AccessLogs', true)
    <!-- Access section -->
    <li class="treeview @if (routeNameIs(['users', 'roles', 'permissions', 'access_logs'], true)) menu-open @endif">
      <a href="#"><i class="fa fa-lock"></i> <span>@lang('users.parent')</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" @if (routeNameIs(['users', 'roles', 'permissions', 'access_logs'], true)) style="display: block;"  @endif>

        @permission('Users', true)
        <!-- Users module -->
        <li class="@if (routeNameIs('users', true)) active @endif">
          <a href="{{ route('users.index') }}"><i class="fa fa-users"></i> <span>@lang('users.title')</span></a>
        </li>
        <!-- /. user module -->
        @endif

        @permission('Roles', true)
        <!-- Role module -->
        <li class="@if (routeNameIs('roles', true)) active @endif">
          <a href="{{ route('roles.index') }}"><i class="fa fa-user"></i><span>@lang('roles.title')</span></a>
        </li>
        <!-- /. role module -->
        @endif

        @permission('Permissions', true)
        <!-- Permission module -->
        <li class="@if (routeNameIs('permissions', true)) active @endif">
          <a href="{{ route('permissions.index') }}"><i class="fa fa-user-secret"></i><span>@lang('permissions.title')</span></a>
        </li>
        <!-- /. permission module -->
        @endif

        @permission('AccessLogs', true)
        <!-- Permission module -->
        <li class="@if (routeNameIs('access_logs', true)) active @endif">
          <a href="{{ route('access_logs.index') }}"><i class="fa fa-user-secret"></i><span>@lang('access_logs.title')</span></a>
        </li>
        <!-- /. permission module -->
        @endif

      </ul>
    </li>
    @endif
    <!-- /. access section -->

    <!-- Content section -->
    @permission('Categories|Articles|Menus|Components', true)
    <li class="treeview @if (routeNameIs(['categories', 'articles', 'menus', 'components'], true)) menu-open @endif">
      <a href="#"><i class="fa fa-pencil"></i> <span>@lang('articles.parent')</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" @if (routeNameIs(['categories', 'articles', 'menus', 'components'], true)) style="display: block;"  @endif>

        @permission('Articles', true)
        <!-- Articles -->
        <li class="@if (routeNameIs('articles', true)) active @endif">
          <a href="{{ route('articles.index') }}"><i class="fa fa-circle-o"></i><span>@lang('articles.title')</span></a>
        </li>
        <!-- /. articles -->
        @endif

        @permission('Categories', true)
        <!-- Categories-->
        <li class="@if (routeNameIs('categories', true)) active @endif">
          <a href="{{ route('categories.index') }}"><i class="fa fa-circle-o"></i><span>@lang('categories.title')</span></a>
        </li>
        <!-- /. categories -->
        @endif

        @permission('Menus', true)
        <!-- Menus-->
        <li class="@if (routeNameIs('menus', true)) active @endif">
          <a href="{{ route('menus.index') }}"><i class="fa fa-circle-o"></i><span>@lang('menus.title')</span></a>
        </li>
        <!-- /. menus -->
        @endif

        @permission('Components', true)
        <!-- Menus-->
        <li class="@if (routeNameIs('components', true)) active @endif">
          <a href="{{ route('components.index') }}"><i class="fa fa-circle-o"></i><span>@lang('components.title')</span></a>
        </li>
        <!-- /. menus -->
        @endif

      </ul>
    </li>
    @endif
    <!-- /. content section -->

    <!-- Settings section -->
    @permission(['Settings', 'Modules'], true)
    <li class="treeview {{ requestIs('admin/settings/*', 'menu-open') }}">
      <a href="#"><i class="fa fa-cog"></i> <span>@lang('settings.parent')</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" @if (routeNameIs('settings.site') || routeNameIs(['modules'], true)) style="display: block;"  @endif>

        @permission('Settings', true)
        <!-- Articles -->
        <li class="{{ requestIs('admin/settings/site') }}">
          <a href="{{ route('settings.site') }}"><i class="fa fa-circle-o"></i><span>@lang('settings.site')</span></a>
        </li>
        <!-- /. articles -->
        @endif

        @permission('Modules', true)
        <!-- Articles -->
        <li class="{{ requestIs('admin/modules') }}">
          <a href="{{ route('modules.index') }}"><i class="fa fa-circle-o"></i><span>@lang('modules.title')</span></a>
        </li>
        <!-- /. articles -->
        @endif

      </ul>
    </li>
    @endif
    <!-- /. settings section -->

  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
