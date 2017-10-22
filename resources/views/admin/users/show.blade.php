@extends('layouts.default')

@section('title', config('app.name', 'Laravel') . ' - ' . ucfirst($name))

@section('content')
<!-- Content header (Page header) -->
  @include('includes.content-header', ['name' => $name, 'after' => ['Show']])
<!-- /. content header -->

<!-- Main content -->
<section class="content container-fluid">

  <div class="row">

    <div class="col-sm-3">

      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="{{ URL::asset($resource->image()) }}">
          <h3 class="profile-username text-center">{{ $resource->name }}</h3>
        </div>
      </div>

      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">About me</h3>
        </div>
        <div class="box-body">
          <p>{{ $resource->description }}</p>
        </div>
      </div>

    </div>

    <div class="col-sm-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#info" data-toggle="tab" aria-expanded="true">Info</a></li>
          <li><a href="#messages" data-toggle="tab" aria-expanded="true">Messages</a></li>
          <li><a href="#settings" data-toggle="tab" aria-expanded="true">Basic Settings</a></li>
        </ul>
        <div class="tab-content">

          <div id="info" class="tab-pane active">
          <p>Roles:</p>
          <ul>
            @foreach ($resource->roles as $role)
            <li>{{ $role->name }}</li>
            @endforeach
          </ul>
          </div>

          <div id="messages" class="tab-pane">B</div>

          <div id="settings" class="tab-pane">
            <div class="box-header with-border">
              <div class="pull-right">
                <a href="{{ route('users.edit', $resource->id) }}" class="btn btn-primary">Advanced settings</a>
                <a href="" class="btn btn-primary">Change password</a>
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
