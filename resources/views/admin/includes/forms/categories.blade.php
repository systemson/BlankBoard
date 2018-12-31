@if (isset($new) && $new)
{{ Form::open(array('url' => route($name . '.store'), 'method' => 'POST', 'class' => 'form-horizontal')) }}
{{ Form::hidden('created_by', auth()->user()->id) }}
@else
{{ Form::open(array('url' => route($name . '.update', $resource->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
@endif

{{ Form::hidden('updated_by', auth()->user()->id) }}

  <div class="form-group">
    <div class="col-sm-12 text-right">
      {{ Form::submit(__('messages.btn.save.name'), array('class' => __('messages.btn.save.class'))) }}
      {{ Form::reset(__('messages.btn.reset.name'), array('class' => __('messages.btn.reset.class'))) }}
    </div>
  </div>

  <div class="col-sm-8 form-horizontal">

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      {{ Form::label('name', __($name . '.table.name') . '(*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('name', $resource->name ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => __($name . '.table.name'))) }}
        @if ($errors->has('name'))
          <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
        @endif
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
      {{ Form::select('status', [1 => 'Active', 0 => 'Inactive'], $resource->status ?? null, array('class' => 'control-form chosen-select')) }}
      @if ($errors->has('status'))
        <span class="help-block">
          <strong>{{ $errors->first('status') }}</strong>
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

