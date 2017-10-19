@extends('layouts.default')

@section('title', config('app.name', 'Laravel') . ' - ' . ucfirst($name))

@section('content')
<!-- Content header (Page header) -->
  @include('includes.content-header', ['name' => $name])
<!-- /. content header -->

<!-- Main content -->
<section class="content container-fluid">

  <div class="row">
    <div class="col-sm-12">
      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 class="box-title">{{ ucfirst($name) }} list</h3>
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
                <th>ID</th>
                <th class="text-center">Action</th>
                <th class="col-sm-12">Name</th>
                <th class="text-center">Status</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($resources as $resource)
              <tr>
                <td>{{ $resource->id }}</td>
                <td class="text-nowrap">
                {{ Form::open(['method' => 'DELETE','route' => [$name . '.destroy', $resource->id]]) }}
                  {{ Form::button('<i class="fa fa-trash"></i>', array(
                    'type' => 'submit',
                    'class'=> 'btn-danger',
                    'onclick'=>'return confirm("This item will be deleted?")'
                  )) }}
                {{ Form::close() }}
                </td>
                <td><a href="{{ route($name . '.show', $resource->id) }}">{{ $resource->name }}</a></td>
                <td><span class="label label-success">Active</span></td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

</section>
<!-- /.content -->
@stop
