@extends('layouts.default')

@section('title', config('app.name', 'Laravel') . ' - ' . ucfirst($name))

@section('content')
<!-- Content header (Page header) -->
  @include('includes.content-header', ['name' => $name, 'after' => ['Edit']])
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
          <li class="active"><a href="#user-data" data-toggle="tab" aria-expanded="true">User data</a></li>
          <li><a href="#password" data-toggle="tab" aria-expanded="true">Password</a></li>
          <li><a href="#image" data-toggle="tab" aria-expanded="true">Image</a></li>
        </ul>

        <div class="tab-content">

          <div id="user-data" class="tab-pane active">
            @include('includes.forms.users_update_adv')
          </div>

          <div id="password" class="tab-pane">
            @include('includes.forms.users_password')
          </div>

          <div id="image" class="tab-pane">
            @include('includes.forms.users_image')
          </div>

        </div>

      </div>
    </div>
  </div>

</section>
<!-- /.content -->
@stop
