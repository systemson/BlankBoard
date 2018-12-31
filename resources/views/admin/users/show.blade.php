@extends('layouts.admin')

@section('title', config('app.name', 'Laravel') . ' - ' . __($name . '.title'))

@section('content-header')
<!-- Content header (Page header) -->
  @include('admin.includes.content-header', ['name' => $name, 'before' => [['name' => __('messages.admin-site'), 'route' => 'admin'], __($name . '.parent')], 'after' => [__('users.show')]])
<!-- /. content header -->
@stop

@section('content')
<div class="col-sm-3">
  @include('admin.includes.box-profile')
</div>

<div class="col-sm-9">

  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#info" data-toggle="tab" aria-expanded="true">{{ __('users.tab-1') }}</a></li>
      <li><a href="#messages" data-toggle="tab" aria-expanded="true">{{ __('users.tab-2') }}</a></li>
      <li><a href="#settings" data-toggle="tab" aria-expanded="true">{{ __('users.tab-3') }}</a></li>
    </ul>
    <div class="tab-content">

      <div id="info" class="tab-pane active">
        <p>{{ __('auth.roles') }}:</p>
        <ul>
          @foreach ($resource->roles as $role)
          <li>{{ $role->name }}</li>
          @endforeach
        </ul>
      </div>

      <div id="messages" class="tab-pane">
        @include('admin.includes.tables.user_emails')
      </div>

      <div id="settings" class="tab-pane">
        <div class="box-header with-border">
          <div class="pull-left">
            <a href="{{ route('users.edit', $resource->id) }}" class="btn btn-primary">{{ __('users.adv-config') }}</a>
          </div>
        </div>

        @include('admin.includes.forms.users_update', ['name' => $name])
      </div>

    </div><!-- /. tab content -->

  </div><!-- /. box -->

</div><!-- /. col -->
@stop
