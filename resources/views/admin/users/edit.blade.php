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
          @if ($resource->image)
          <img class="profile-user-img img-responsive img-circle" src="{{ URL::asset($resource->image) }}">
          @else
          <img class="profile-user-img img-responsive img-circle" src="{{ URL::asset('img/avatar/default.png') }}">
          @endif
          <h3 class="profile-username text-center">{{ $resource->name }}</h3>
          <p class="text-muted text-center">
          @foreach ($resource->roles as $roles)
            {{ $roles->name }}&nbsp;
          @endforeach
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
      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 class="box-title">Edit data</h3>
        </div>

        <div class="box-body">
          @include('includes.forms.' . $name)
        </div>

      </div>
    </div>
  </div>

</section>
<!-- /.content -->
@stop
