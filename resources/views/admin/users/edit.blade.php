@extends('layouts.admin')

@section('title', config('app.name', 'Laravel') . ' - ' . __($name . '.title'))

@section('content')
<!-- Content header (Page header) -->
  @include('includes.content-header', ['name' => $name, 'before' => [['name' => 'Admin', 'route' => 'admin'], __($name . '.parent')], 'after' => [__('messages.edit')]])
<!-- /. content header -->

<!-- Main content -->
<section class="content container-fluid">

  <div class="row">

    <div class="col-sm-12">
      @include('includes.alerts')
    </div>

    @if (Auth::id() == $resource->id)
      <div class="col-sm-3">
        @include('includes.box-profile')
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
            @include('includes.forms.users_update_adv')
          </div>

          <div id="password" class="tab-pane">
            @include('includes.forms.users_password')
          </div>

          <div id="image" class="tab-pane">
            @include('includes.forms.users_image')
          </div>

        </div><!-- /. tab content -->

      </div><!-- /. box -->

    </div><!-- /. col -->
  </div><!-- /. row -->

</section><!-- /.content -->
@stop
