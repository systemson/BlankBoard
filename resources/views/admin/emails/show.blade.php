@extends('layouts.admin')

@section('title', config('app.name', 'Laravel') . ' - ' . __($name . '.title'))

@section('content-header')
<!-- Content header (Page header) -->
  @include('admin.includes.content-header', ['name' => $name, 'before' => [['name' => __('messages.admin-site'), 'route' => 'admin'], __($name . '.parent')], 'after' => [__('messages.show')]])
<!-- /. content header -->
@stop

@section('content')
<div class="col-sm-3">
  @include('admin.includes.box-email')
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
          <span class="mailbox-read-time pull-right">{{ $resource->created_at->format(__('messages.date-format')) }}</span>
        </p>
        <p>To: {{ $resource->recipients->pluck('name')->implode(', ') }}</p>
      </div>

      <div class="mailbox-controls with-border text-center">
        <div class="btn-group">
          <div>
            {{ Form::open(['method' => 'GET','route' => [$name . '.create'], 'class' => 'inline']) }}
            {{ Form::button('<i class="fa fa-reply" title="'.__('messages.reply').'"></i>', [
            'type' => 'submit',
            'class'=> 'btn btn-info btn-xs',
            'value' => $resource->id,
            'name' => 'parent_id',
            ]) }}
            {{ Form::close() }}
            {{ Form::open(['method' => 'GET','route' => [$name . '.create'], 'class' => 'inline']) }}
            {{ Form::button('<i class="fa fa-share" title="'.__('messages.forward').'"></i>', [
            'type' => 'submit',
            'class'=> 'btn btn-info btn-xs',
            'value' => $resource->id,
            'name' => 'parent_id',
            ]) }}
            {{ Form::hidden('forward', 1) }}
            {{ Form::close() }}
            {{ Form::open(['method' => 'DELETE','route' => [$name . '.destroy', $resource->id], 'class' => 'inline']) }}
            {{ Form::button('<i class="fa fa-trash" title="'.__('messages.delete').'"></i>', [
            'type' => 'submit',
            'class'=> 'btn btn-danger btn-xs',
            'onclick'=>'return confirm("' . __($name . '.confirm-delete') . '")'
            ]) }}
            {{ Form::close() }}
          </div>
        </div>
      </div>

      <div class="mailbox-read-message">{{ $resource->body }}</div>
    </div>

    <div class="box-footer">
      <div class="pull-right">
        {{ Form::open(['method' => 'GET','route' => [$name . '.create'], 'class' => 'inline']) }}
        {{ Form::button('<i class="fa fa-reply"></i> ' . __('messages.reply'), [
        'type' => 'submit',
        'class'=> 'btn btn-default',
        'value' => $resource->id,
        'name' => 'parent_id',
        ]) }}
        {{ Form::close() }}
        {{ Form::open(['method' => 'GET','route' => [$name . '.create'], 'class' => 'inline']) }}
        {{ Form::button('<i class="fa fa-share"></i> ' . __('messages.forward'), [
        'type' => 'submit',
        'class'=> 'btn btn-default',
        'value' => $resource->id,
        'name' => 'parent_id',
        ]) }}
        {{ Form::hidden('forward', 1) }}
        {{ Form::close() }}
        {{ Form::open(['method' => 'DELETE','route' => [$name . '.destroy', $resource->id], 'class' => 'inline']) }}
        {{ Form::button('<i class="fa fa-trash"></i> ' . __('messages.delete'), [
        'type' => 'submit',
        'class'=> 'btn btn-default',
        'onclick'=>'return confirm("' . __($name . '.confirm-delete') . '")'
        ]) }}
        {{ Form::close() }}
      </div>
    </div>

  </div><!-- /. box -->

</div><!-- /. col -->
@stop
