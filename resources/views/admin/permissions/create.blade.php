@extends('layouts.default')

@section('title', config('app.name', 'Laravel') . ' - ' . ucfirst($name))

@section('content')
<!-- Content header (Page header) -->
  @include('includes.content-header', ['name' => $name, 'after' => ['New']])
<!-- /. content header -->

<!-- Main content -->
<section class="content container-fluid">

  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 class="box-title">Add new record</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" type="button" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div><!-- Box header -->

        <div class="box-body no-padding">
          <div class="col-sm-10">
            @include('includes.forms.' . $name, ['new' => 'true'])
          </div>
        </div>

      </div>
    </div>
  </div>

</section>
<!-- /.content -->
@stop
