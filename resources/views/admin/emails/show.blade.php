@extends('layouts.admin')

@section('title', config('app.name', 'Laravel') . ' - ' . __($name . '.title'))

@section('content')
<!-- Content header (Page header) -->
    @include('includes.content-header', ['name' => $name, 'before' => [['name' => 'Admin', 'route' => 'admin'], __($name . '.parent')], 'after' => [__('messages.show')]])
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
          <h3 class="box-title">{{ __($name . '.view', ['name' => trans_choice($name . '.name', 1), 'resource' => $resource->name ]) }}</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" type="button" data-widget="collapse">
             <i class="fa fa-minus"></i>
            </button>
          </div>
        </div><!-- /. box header -->

        <div class="box-body">

          <div class="mailbox-read-info">
            <h3>{{ $resource->subject }}</h3>
            <p>From: {{ $resource->user->name  }}
              <span class="mailbox-read-time pull-right">{{ $resource->created_at->format('j M. Y g:i a') }}</span>
            </p>
            <p>To: {{ $resource->recipients->pluck('name')->implode(', ') }}</p>
          </div>

          <div class="mailbox-controls with-border text-center">
            <div class="btn-group">
              <div>
                {{ Form::open(['method' => 'DELETE','route' => [$name . '.destroy', $resource->id]]) }}
                  {{ Form::button('<i class="fa fa-trash"></i>', [
                    'type' => 'submit',
                    'class'=> 'btn btn-danger btn-xs',
                    'onclick'=>'return confirm("' . __($name . '.confirm-delete') . '")'
                   ]) }}
                {{ Form::close() }}
              </div>
              <!--<div class="btn btn-default btn-sm"><i class="fa fa-reply"></i></div>
              <div class="btn btn-default btn-sm"><i class="fa fa-share"></i></div>-->
            </div>
          </div>

          <div class="mailbox-read-message">{{ $resource->body }}</div>
        </div>

        <div class="box-footer">
          <div class="pull-right">
            <div class="btn btn-default"><i class="fa fa-reply"></i> Reply</div>
            <div class="btn btn-default"><i class="fa fa-share"></i> Forward</div>
          </div>
        </div>

      </div><!-- /. box -->

    </div><!-- /. col -->
  </div><!-- /. row -->

</section><!-- /.content -->
@stop
