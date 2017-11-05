@extends('layouts.admin')

@section('title', config('app.name', 'Laravel') . ' - ' .  __($name . '.title'))

@section('content')
<!-- Content header (Page header) -->
  @include('includes.content-header', ['name' => $name, 'before' => [['name' => 'Admin', 'route' => 'admin'], __($name . '.parent')], 'after' => [__('messages.new')]])
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
          <h3 class="box-title">{{ __($name . '.add', ['name' => trans_choice($name . '.name', 1)]) }}</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" type="button" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div><!-- /. box header -->

        <div class="box-body">
          @include('includes.forms.users_create', ['new' => 'true'])
        </div><!-- /. box body -->

      </div><!-- /. box -->

    </div><!-- /. col -->
  </div><!-- /. row -->

</section><!-- /.content -->
@stop
