@extends('layouts.admin')

@section('title', 'Error ' . $exception->getStatusCode())

@section('content')
<!-- Content header (Page header) -->

<!-- /. content header -->

<!-- Main content -->
<section class="content container-fluid">

  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Error</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" type="button" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div><!-- Box header -->
        <div class="box-body">
          <h2>{{ $exception->getMessage() }}</h2>
        </div>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->
@stop
