@extends('layouts.admin')

@section('title', config('app.name', 'Laravel') . ' - ' . __($name . '.title'))

@section('content-header')
<!-- Content header (Page header) -->
  @include('admin.includes.content-header', ['name' => $name, 'before' => [['name' => __('messages.admin-site'), 'route' => 'admin'], __($name . '.parent')]])
<!-- /. content header -->
@stop

@section('content')
<div class="col-sm-3">
  @include('admin.includes.box-email')
</div>

<div class="col-sm-9">
  <div class="box box-primary">

    <div class="box-body no-padding">
      <div class="mailbox-messages">
        @if (routeNameIs('emails.index'))
        @include('admin.includes.tables.emails_inbox')
        @elseif (routeNameIS('emails.draft'))
        @include('admin.includes.tables.emails_draft')
        @elseif (routeNameIS('emails.sent'))
        @include('admin.includes.tables.emails_sent')
        @elseif (routeNameIS('emails.trash'))
        @include('admin.includes.tables.emails_trash')
        @endif
      </div>
    </div>

  </div><!-- /. box -->

</div><!-- /. col -->
@stop
