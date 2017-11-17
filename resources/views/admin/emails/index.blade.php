@extends('layouts.admin')

@section('title', config('app.name', 'Laravel') . ' - ' . __($name . '.title'))

@section('content')
<!-- Content header (Page header) -->
  @include('includes.content-header', ['name' => $name, 'before' => [['name' => 'Admin', 'route' => 'admin'], __($name . '.parent')]])
<!-- /. content header -->

<!-- Main content -->
<section class="content container-fluid">

  <div class="row">

    <div class="col-sm-12">
      @include('includes.alerts')
    </div>

    <div class="col-sm-3">
      @include('includes.box-email')
    </div>

    <div class="col-sm-9">
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
          <div class="mailbox-messages">
            @if (routeNameIs('emails.index'))
              @include('includes.tables.emails')
            @elseif (routeNameIS('emails.draft'))
              @include('includes.tables.emails_draft')
            @elseif (routeNameIS('emails.sent'))
              @include('includes.tables.emails_sent')
            @elseif (routeNameIS('emails.trash'))
              @include('includes.tables.emails_trash')
            @endif
          </div>
        </div>

      </div><!-- /. box -->

    </div><!-- /. col -->
  </div><!-- /. row -->

</section><!-- /.content -->
@stop
