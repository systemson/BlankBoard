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

    <div class="col-sm-3">
      @include('includes.box-email')
    </div>

    <div class="col-sm-9">
      <div class="box box-primary">

        <div class="box-body no-padding">
          <div class="mailbox-messages">
            @if (routeNameIs('emails.index'))
              @include('includes.tables.emails_inbox')
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
