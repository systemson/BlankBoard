@extends('layouts.default')

@section('title', config('app.name', 'Laravel') . ' - ' . __($name . '.title'))

@section('content')
<!-- Content header (Page header) -->
  @include('includes.content-header', ['name' => $name, 'after' => [__('messages.show')]])
<!-- /. content header -->

<!-- Main content -->
<section class="content container-fluid">

  <div class="row">

    <div class="col-sm-3">

      <div class="box box-primary">
        <div class="box-body box-profile">

          <img class="profile-user-img img-responsive img-circle" src="{{ URL::asset(Auth::image()) }}">

          <h3 class="profile-username text-center">{{ Auth::name() }}</h3>

          <p class="text-muted text-center">
          {{ Auth::user()->roles->implode('name', ', ') }}.
          </p>
        </div>
      </div>

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('auth.description') }}</h3>
        </div>
        <div class="box-body">
          <p>{{ $resource->description }}</p>
        </div>
      </div>

    </div>

    <div class="col-sm-9">

      @if (Auth::user()->isActive() == false)
      <div class="alert alert-warning">
        <h3>Inactive short message</h3>
        <p>Inactive long message</p>
      </div>
      @endif

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

          <div id="messages" class="tab-pane">B</div>

          <div id="settings" class="tab-pane">
            <div class="box-header with-border">
              <div class="pull-left">
                <a href="{{ route('users.edit', $resource->id) }}" class="btn btn-primary">{{ __('users.adv-config') }}</a>
              </div>
            </div>

            @include('includes.forms.users_update', ['name' => $name])
          </div>

        </div>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
@stop
