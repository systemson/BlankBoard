@extends('layouts.admin')

@section('title', config('app.name', 'Laravel') . ' - ' . __($name . '.title'))

@section('content-header')
<!-- Content header (Page header) -->
  @include('admin.includes.content-header', ['name' => $name, 'before' => [['name' => __('messages.admin-site'), 'route' => 'admin'], __($name . '.parent')]])
<!-- /. content header -->
@stop

@section('content')
<div class="col-sm-12">
  <div class="box box-primary">

    <div class="box-header with-border">
      <h3 class="box-title">{{ __($name . '.list', ['title' => __($name . '.title')]) }}</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" type="button" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div><!-- Box header -->

    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>{{ __($name . '.table.id') }}</th>
            <th class="col-sm-12">{{ __($name . '.table.name') }}</th>
            <th>{{ __($name . '.table.module') }}</th>
            <th>{{ __($name . '.table.slug') }}</th>
            <th class="text-center">{{ __($name . '.table.status') }}</th>
          </tr>
        </thead>
        <tbody>

          @forelse ($resources as $resource)
          <tr>
            <td>{{ $resource->id }}</td>
            <td>
              @if (Auth::user()->hasPermission('update_' . $name))
              <a href="{{ route($name . '.edit', $resource->id) }}">{{ Lang::has($name . '.' .$resource->slug . '.name') ? __($name . '.' .$resource->slug . '.name') : $resource->name }}</a>
              @else
              {{ $resource->name }}
              @endif
            </td>
          </td>
          <td>{{ Lang::has($name . '.' .$resource->slug . '.module') ? __($name . '.' .$resource->slug . '.module') : $resource->module }}</td>
          <td>{{ $resource->slug }}</td>
          <td>{!! status_label($resource->status) !!}</td>
        </tr>
        @empty
          <tr><td colspan="5">{{ __('messages.no-results') }}</td></tr>
        @endforelse

      </tbody>
    </table>
    <div class="col-sm-12">
      <div class="text-right">{{ $resources->links() }}</div>
    </div>
  </div>

</div><!-- /. col -->
@stop
