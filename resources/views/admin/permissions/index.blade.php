@extends('layouts.default')

@section('title', config('app.name', 'Laravel') . ' - ' . __($name . '.title'))

@section('content')
<!-- Content header (Page header) -->
  @include('includes.content-header', ['name' => $name, 'before' => [__($name . '.parent')]])
<!-- /. content header -->

<!-- Main content -->
<section class="content container-fluid">

  <div class="row">

    <div class="col-sm-12" style="padding-top: 20px">
      @include('includes.alerts')
    </div>

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

            @foreach ($resources as $resource)
              <tr>
                <td>{{ $resource->id }}</td>
                <td><a href="{{ route($name . '.edit', $resource->id) }}">{{ $resource->name }}</a></td>
                <td>{{ $resource->module }}</td>
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
        </div>

      </div><!-- /. box -->

    </div><!-- /. col -->
  </div><!-- /. row -->

</section><!-- /.content -->
@stop
