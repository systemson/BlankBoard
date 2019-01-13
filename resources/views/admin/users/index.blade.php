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
        @if (Auth::user()->hasPermission('create_' . $name))
        {!! button('new', route($name . '.create')) !!}
        @endif
        <button class="btn btn-box-tool" type="button" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div><!-- /. box header -->

    <div class="box-body no-padding">
      {!! $resources->appends(['sort' => 'votes'])->render() !!}
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            <th>{{ __($name . '.table.id') }}</th>
            @if (Auth::user()->hasPermission('delete_' . $name))
            <th class="text-center">{{ __($name . '.table.action') }}</th>
            @endif
            <th class="col-sm-12">{{ __($name . '.table.name') }}</th>
            <th class="text-center">{{ __($name . '.table.status') }}</th>
          </tr>
        </thead>
        <tbody>

          @forelse ($resources as $resource)
          <tr>
            <td>{{ $resource->id }}</td>
            @if (Auth::user()->hasPermission('delete_' . $name) && auth()->user()->id !== $resource->id && $resource->id !== 1)
            <td class="text-nowrap">{!! delete_btn($resource->id, $name) !!}</td>
            @else
            <td></td>
            @endif
            <td>
              @if (Auth::user()->hasPermission('update_' . $name))
              <a href="{{ route($name . '.edit', $resource->id) }}">{{ $resource->name }}</a>
              @else
              {{ $resource->name }}
              @endif
            </td>
            <td>{!! status_label($resource->status) !!}</td>
          </tr>
          @empty
          <tr><td colspan="4">{{ __('messages.no-results') }}</td></tr>
          @endforelse

        </tbody>
      </table>
      <div class="col-sm-12">
        <div class="text-right">{{ $resources->links() }}</div>
      </div>
    </div><!-- /. box-body -->

  </div><!-- /. box -->
</div><!-- /. col -->
@stop
