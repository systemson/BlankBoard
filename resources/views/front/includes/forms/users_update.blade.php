{{ Form::open(array('url' => route('users.update', $resource->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}

  {{ Form::hidden('form', 'user-basic') }}

  <div class="form-group">
    <div class="col-sm-12 text-right">
      {{ Form::submit( __('messages.btn.save.name'), array('class' => __('messages.btn.save.class'))) }}
      {{ Form::reset( __('messages.btn.reset.name'), array('class' => __('messages.btn.reset.class'))) }}
    </div>
  </div>

  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {{ Form::label('name', __('auth.name') . ' (*)', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::text('name', $resource->name, array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.name'))) }}
      @if ($errors->has('name'))
        <span class="help-block">
          <strong>{{ $errors->first('name') }}</strong>
        </span>
      @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
    {{ Form::label('last_name', __('auth.lastname'), array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::text('last_name', $resource->last_name, array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.lastname'))) }}
      @if ($errors->has('last_name'))
        <span class="help-block">
          <strong>{{ $errors->first('last_name') }}</strong>
        </span>
      @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    {{ Form::label('description', __('auth.description'), array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::textarea('description', $resource->description, array('class' => 'col-sm-12 control-form', 'rows' => '4')) }}
      @if ($errors->has('description'))
        <span class="help-block">
          <strong>{{ $errors->first('description') }}</strong>
        </span>
      @endif
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <p class="text-red"><strong>{{ __('messages.required-fields') }}</strong></p>
    </div>
  </div>

{{ Form::close() }}
