@extends('layouts.admin')

@section('title', config('app.name', 'Laravel') . ' - ' . __($name . '.title'))

@section('content-header')
<!-- Content header (Page header) -->
  @include('admin.includes.content-header', ['name' => $name, 'before' => [['name' => __('messages.admin-site'), 'route' => 'admin'], __($name . '.parent')], 'after' => [__('messages.edit')]])
<!-- /. content header -->
@stop

@section('content')
@if (Auth::id() == $resource->id)
<div class="col-sm-3">
  @include('admin.includes.box-profile')
</div>
@endif

<div class="@if(Auth::id() == $resource->id) col-sm-9 @else col-sm-12 @endif">

  <div class="nav-tabs-custom">

    <ul class="nav nav-tabs">
      <li class="active"><a href="#user-data" data-toggle="tab" aria-expanded="true">{{ __('users.tab-4') }}</a></li>
      <li><a href="#password" data-toggle="tab" aria-expanded="true">{{ __('users.tab-5') }}</a></li>
      <li><a href="#image" data-toggle="tab" aria-expanded="true">{{ __('users.tab-6') }}</a></li>
    </ul>

    <div class="tab-content">

      <div id="user-data" class="tab-pane active">
        @include('admin.includes.forms.users_update_adv')
      </div>

      <div id="password" class="tab-pane">
        @include('admin.includes.forms.users_password')
      </div>

      <div id="image" class="tab-pane">
        @include('admin.includes.forms.users_image')
      </div>

    </div><!-- /. tab content -->

  </div><!-- /. box -->

</div><!-- /. col -->
@stop
