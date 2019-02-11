@section('styles')
@parent

<style type="text/css">
.btn-outline-success:not(:disabled):not(.disabled).active,
.btn-outline-success:not(:disabled):not(.disabled):active {
  color: #fff;
  background-color: #28a745;
  border-color: #28a745;
}
.btn-outline-danger:not(:disabled):not(.disabled).active,
.btn-outline-danger:not(:disabled):not(.disabled):active {
  color: #fff;
  background-color: #dc3545;
  border-color: #dc3545;
}
.btn-outline-success:not(:disabled):not(.disabled):not(.active),
.btn-outline-success:not(:disabled):not(.disabled):not(.active) {
  border-color: #28a745;
}
.btn-outline-danger:not(:disabled):not(.disabled):not(.active),
.btn-outline-danger:not(:disabled):not(.disabled):not(.active) {
  border-color: #dc3545;
}
</style>
@endsection

@if (isset($new) && $new)
{{ Form::open(array('url' => route($name . '.store'), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true)) }}
@else
{{ Form::open(array('url' => route($name . '.update', $resource->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true)) }}
@endif

<div class="form-group">
  <div class="col-sm-12 text-right">
    {{ Form::submit(__('messages.btn.save.name'), array('class' => __('messages.btn.save.class'))) }}
    {{ Form::reset(__('messages.btn.reset.name'), array('class' => __('messages.btn.reset.class'))) }}
    <a class="@lang('messages.btn.register.class')" href="{{ route($resource->slug . '.register') }}" onclick="return confirm('@lang($name . '.confirm-register')');">@lang('messages.btn.register.name')</a>
  </div>
</div>

<div class="col-sm-8 form-horizontal">

  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {{ Form::label('name', __($name . '.table.name') . ' (*)', array('class' => 'col-sm-4 control-label')) }}
    <div class="col-sm-8">
      {{ Form::text('name', $resource->name ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => __($name . '.table.name'), 'disabled')) }}
    </div>
  </div>

  <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
    {{ Form::label('slug', __($name . '.table.slug') . ' (*)', array('class' => 'col-sm-4 control-label')) }}
    <div class="col-sm-8">
      {{ Form::text('slug', $resource->slug ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => __($name . '.table.slug'), 'disabled')) }}
    </div>
  </div>

  <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    {{ Form::label('description', __($name . '.table.description'), array('class' => 'col-sm-4 control-label')) }}
    <div class="col-sm-8">
      {{ Form::textarea('description', $resource->description ?? null, array('class' => 'col-sm-12 control-form', 'rows' => '4')) }}
      @if ($errors->has('description'))
      <span class="help-block">
        <strong>{{ $errors->first('description') }}</strong>
      </span>
      @endif
    </div>
  </div>

</div>

<div class="col-sm-4 form-vertical">

  <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    {{ Form::select('status', [1 => __('messages.status.1.name')], $resource->status ?? null, array('class' => 'control-form chosen-select', 'disabled')) }}
    @if ($errors->has('status'))
    <span class="help-block">
      <strong>{{ $errors->first('status') }}</strong>
    </span>
    @endif
  </div>

  <div class="form-group{{ $errors->has('can_create') ? ' has-error' : '' }}">
    <div class="btn-group btn-group-toggle col-sm-12">
      <span class="control-label"><b>@lang($name . '.table.can_create') (*)</b></span>
      <div class="row" data-toggle="buttons">
        <label class="btn btn-sm btn-outline-success col-sm-6 {{ $resource->can_create ? 'active' : null}}">
          @lang('messages.yes')
        </label>
        <label class="btn btn-sm btn-outline-danger col-sm-6 {{ !$resource->can_create ? 'active' : null}}">
          @lang('messages.no')
        </label>
      </div>
    </div>
  </div>

  <div class="form-group{{ $errors->has('can_read') ? ' has-error' : '' }}">
    <div class="btn-group btn-group-toggle col-sm-12">
      <span class="control-label"><b>@lang($name . '.table.can_read') (*)</b></span>
      <div class="row" data-toggle="buttons">
        <label class="btn btn-sm btn-outline-success col-sm-6 {{ $resource->can_read ? 'active' : null}}">
          @lang('messages.yes')
        </label>
        <label class="btn btn-sm btn-outline-danger col-sm-6 {{ !$resource->can_read ? 'active' : null}}">
          @lang('messages.no')
        </label>
      </div>
    </div>
  </div>

  <div class="form-group{{ $errors->has('can_update') ? ' has-error' : '' }}">
    <div class="btn-group btn-group-toggle col-sm-12">
      <span class="control-label"><b>@lang($name . '.table.can_update') (*)</b></span>
      <div class="row" data-toggle="buttons">
        <label class="btn btn-sm btn-outline-success col-sm-6 {{ $resource->can_update ? 'active' : null}}">
          @lang('messages.yes')
        </label>
        <label class="btn btn-sm btn-outline-danger col-sm-6 {{ !$resource->can_update ? 'active' : null}}">
          @lang('messages.no')
        </label>
      </div>
    </div>
  </div>

  <div class="form-group{{ $errors->has('can_delete') ? ' has-error' : '' }}">
    <div class="btn-group btn-group-toggle col-sm-12">
      <span class="control-label"><b>@lang($name . '.table.can_delete') (*)</b></span>
      <div class="row" data-toggle="buttons">
        <label class="btn btn-sm btn-outline-success col-sm-6 {{ $resource->can_delete ? 'active' : null}}">
          @lang('messages.yes')
        </label>
        <label class="btn btn-sm btn-outline-danger col-sm-6 {{ !$resource->can_delete ? 'active' : null}}">
          @lang('messages.no')
        </label>
      </div>
    </div>
  </div>

</div>

<div class="col-sm-offset-3 col-sm-9">
  <div class="form-group">
    <p class="text-red"><strong>{{ __('messages.required-fields') }}</strong></p>
  </div>
</div>

{{ Form::close() }}
