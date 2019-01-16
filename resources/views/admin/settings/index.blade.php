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
      <h3 class="box-title">@lang($name . '.list', ['title' => __($name . '.title')])</h3>
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
            <th>@lang($name . '.table.id')</th>
            <th class="col-sm-6">@lang($name . '.table.name')</th>
            <th class="text-center">@lang($name . '.table.value')</th>
            <th class="text-center"></th>
          </tr>
        </thead>
        <tbody>

          @forelse($resources as $resource)
          <tr>
            <td>{{ $resource->id }}</td>
            <td>{{ $resource->name }}</td>
              {{ Form::open(['url' => route($name . '.update', $resource->id), 'method' => 'PUT']) }}
            <td>
              {{ Form::text('value', $resource->value, ['class' => 'col-sm-12']) }}
            </td>
            <td><button class="btn btn-xs btn-primary" type="submit"><i class="fa fa-pencil"></i></button></td>
              {{ Form::close() }}
          </tr>
          @empty
          <tr><td colspan="4">@lang('messages.no-results')</td></tr>
          @endforelse

        </tbody>
      </table>

      <div class="col-sm-12">
        <div class="text-right">{{ $resources->links() }}</div>
      </div>

    </div><!-- /. box body -->

  </div><!-- /. box -->

</div><!-- /. col -->
@stop
