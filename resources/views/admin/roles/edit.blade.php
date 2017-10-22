@extends('layouts.default')

@section('title', config('app.name', 'Laravel') . ' - ' . ucfirst($name))

@section('content')
<!-- Content header (Page header) -->
  @include('includes.content-header', ['name' => $name, 'after' => ['Edit']])
<!-- /. content header -->

<!-- Main content -->
<section class="content container-fluid">

  <div class="box box-primary">

    <div class="box-header with-border">
      <h3 class="box-title">Edit {{ strtolower($name) . ': ' . $resource->name }}</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" type="button" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div><!-- /. box header -->

    <div class="box-body">
      @include('includes.forms.' . $name, ['name' => $name])
    </div><!-- /. box body -->

  </div><!-- /. box -->

</section>
<!-- /.content -->
@stop
