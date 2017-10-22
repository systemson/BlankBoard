@extends('layouts.default')

@section('title', config('app.name', 'Laravel') . ' - ' . ucfirst($name))

@section('content')
<!-- Content header (Page header) -->
  @include('includes.content-header', ['name' => $name, 'after' => ['Show']])
<!-- /. content header -->

<!-- Main content -->
<section class="content container-fluid">

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Edit</h3>
    </div>
    <div class="box-body">
      @include('includes.forms.' . $name, ['name' => $name])
    </div>
  </div>

</section>
<!-- /.content -->
@stop
