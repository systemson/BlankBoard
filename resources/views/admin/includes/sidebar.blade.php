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

    @if (Auth::user()->isActive() && !Auth::user()->passwordExpired())
    <!-- Mailbox Module -->
    <li class="treeview @if (routeNameIs('emails', true) || routeNameIs(['emails.sent', 'emails.draft', 'emails.trash'])) menu-open @endif">
      <a href="#"><i class="fa fa-envelope"></i> <span>{{ __('emails.parent') }}</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" @if (routeNameIs('emails', true) || routeNameIs(['emails.sent', 'emails.draft', 'emails.trash'])) style="display: block;"  @endif>

        <!-- Inbox -->
        <li class="@if (routeNameIs('emails', true) || routeNameIs('emails.draft')) active @endif">
          <a href="{{ URL::route('emails.index') }}"><i class="fa fa-circle-o"></i><span>{{ __('emails.title') }}</span></a>
        </li>
        <!-- /. inbox -->

        <!-- Sent emails -->
        <li class="@if (routeNameIs('emails.sent')) active @endif">
          <a href="{{ URL::route('emails.sent') }}"><i class="fa fa-circle-o"></i><span>{{ __('emails.sent') }}</span></a>
        </li>
        <!-- /. sent emails -->

        <!-- Trash emails -->
        <li class="@if (routeNameIs('emails.trash')) active @endif">
          <a href="{{ URL::route('emails.trash') }}"><i class="fa fa-circle-o"></i><span>{{ __('emails.trash') }}</span></a>
        </li>
        <!-- /. trash emails -->

      </ul>
    </li>
    <!-- /. mailbox module -->
    @endif

    @if (Auth::user()->hasPermission('Users|Roles|Permissions', true))
    <!-- Access section -->
    <li class="treeview @if (routeNameIs(['users', 'roles', 'permissions'], true)) menu-open @endif">
      <a href="#"><i class="fa fa-lock"></i> <span>{{ __('users.parent') }}</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" @if (routeNameIs(['users', 'roles', 'permissions'], true)) style="display: block;"  @endif>

        @if (Auth::user()->hasPermission('Users', true))
        <!-- Users module -->
        <li class="@if (routeNameIs('users', true)) active @endif">
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
    <!-- /. access section -->

    <!-- Content module -->
    @if (Auth::user()->hasPermission('Categories|Articles', true))
    <li class="treeview @if (routeNameIs(['categories', 'articles'], true)) menu-open @endif">
      <a href="#"><i class="fa fa-pencil"></i> <span>Contenido</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu" @if (routeNameIs(['categories', 'articles'], true)) style="display: block;"  @endif>

        <!-- Inbox -->
        <li class="@if (routeNameIs('articles', true)) active @endif">
          <a href="{{ URL::route('articles.index') }}"><i class="fa fa-circle-o"></i><span>Publicaciones</span></a>
        </li>
        <!-- /. inbox -->

        <!-- Sent emails -->
        <li class="@if (routeNameIs('categories', true)) active @endif">
          <a href="{{ URL::route('categories.index') }}"><i class="fa fa-circle-o"></i><span>Categorias</span></a>
        </li>

      </ul>
    </li>
    @endif
    <!-- /. content section -->

  </ul>
  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
