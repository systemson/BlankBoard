@if (isset($new) && $new)
{{ Form::open(array('url' => route($name . '.store'), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true)) }}
@else
{{ Form::open(array('url' => route($name . '.update', $resource->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true)) }}
@endif

<div class="form-group">
  <div class="col-sm-12 text-right">
    {{ Form::submit(__('messages.btn.save.name'), array('class' => __('messages.btn.save.class'))) }}
    {{ Form::reset(__('messages.btn.reset.name'), array('class' => __('messages.btn.reset.class'))) }}
  </div>
</div>

<div class="col-sm-8 form-horizontal">

  @include('admin.includes.forms.inputs.' . $resource->type, ['name' => $name, 'input' => 'value', 'value' => $resource->value, 'title' =>  $resource->name])

</div>

<div class="col-sm-4 form-vertical">

  <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    {{ Form::text('type', $resource->type ?? null, array('class' => 'text-center control-form', 'placeholder' => __($name . '.table.type'), 'disabled')) }}
    @if ($errors->has('type'))
    <span class="help-block">
      <strong>{{ $errors->first('type') }}</strong>
    </span>
    @endif
  </div>

</div>

<div class="col-sm-offset-3 col-sm-9">
  <div class="form-group">
    <p class="text-red"><strong>{{ __('messages.required-fields') }}</strong></p>
  </div>
</div>

{{ Form::close() }}