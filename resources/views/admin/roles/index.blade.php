@extends('layouts.admin')

@section('title', config('app.name', 'Laravel') . ' - ' . __($name . '.title'))

@section('content')
<!-- Content header (Page header) -->
  @include('includes.content-header', ['name' => $name, 'before' => [['name' => __('messages.admin-site'), 'route' => 'admin'], __($name . '.parent')]])
<!-- /. content header -->

<!-- Main content -->
<section class="content container-fluid">

  <div class="row">

    <div class="col-sm-12">
      @include('includes.alerts')
    </div>

    <div class="col-sm-12">
      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 class="box-title">{{ ucfirst($name) }} list</h3>
          <div class="box-tools pull-right">
            @if (Auth::user()->hasPermission('create_' . $name))
              <a class="{{ __('messages.btn.new.class') }}" href="{{ route($name . '.create') }}" >
                <i class="fa fa-plus-circle"></i>
                {{ __('messages.btn.new.name') }}
              </a>
            @endif
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
                @if (Auth::user()->hasPermission('delete_' . $name))
                  <th class="text-center">{{ __($name . '.table.action') }}</th>
                @endif
                <th class="col-sm-12">{{ __($name . '.table.name') }}</th>
                <th>{{ __($name . '.table.slug') }}</th>
                <th class="text-center">{{ __($name . '.table.status') }}</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($resources as $resource)
              <tr>
                <td>{{ $resource->id }}</td>
                @if (Auth::user()->hasPermission('delete_' . $name))
                  <td class="text-nowrap">
                    {{ Form::open(['method' => 'DELETE','route' => [$name . '.destroy', $resource->id]]) }}
                      {{ Form::button( __('messages.action.trash'), array(
                        'type' => 'submit',
                        'class'=> 'btn-danger btn-xs',
                        'onclick'=>'return confirm("' . __($name . '.confirm-delete') . '")'
                      )) }}
                    {{ Form::close() }}
                  </td>
                @endif
                <td>
                  @if (Auth::user()->hasPermission('update_' . $name))
                    <a href="{{ route($name . '.edit', $resource->id) }}">{{ $resource->name }}</a>
                  @else
                    {{ $resource->name }}
                  @endif
                </td>
                <td>{{ $resource->slug }}</td>
                <td><span class="{{ __('messages.status.' . $resource->status . '.class') }}">
                  {{ __('messages.status.' . $resource->status . '.name') }}
                </span></td>
              </tr>
              @endforeach

            </tbody>
          </table>

          <div class="col-sm-12">
            <div class="text-right">{{ $resources->links() }}</div>
          </div>

        </div><!-- /. box body -->

      </div><!-- /. box -->

    </div><!-- /. col -->
  </div><!-- /. row -->

</section><!-- /.content -->
@stop
