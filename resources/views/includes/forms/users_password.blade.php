{{ Form::open(array('url' => route('users.update', $resource->id), 'method' => 'PATCH', 'class' => 'form-horizontal')) }}

  {{ Form::hidden('form', 'password-update') }}

  <div class="form-group">
    <div class="col-sm-12 text-right">
      {{ Form::submit(__('messages.btn.save.name'), array('class' => __('messages.btn.save.class'))) }}
      {{ Form::reset(__('messages.btn.reset.name'), array('class' => __('messages.btn.reset.class'))) }}
    </div>
  </div>

  <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
    {{ Form::label('old_password', __('auth.old_password') . ' (*)', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::password('old_password', array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.old_password'))) }}
      @if ($errors->has('old_password'))
        <span class="help-block">
          <strong>{{ $errors->first('old_password') }}</strong>
        </span>
      @endif
    </div>
  </div>

  <hr>

  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {{ Form::label('password', __('auth.new_password') . ' (*)', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::password('password', array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.new_password'))) }}
      @if ($errors->has('password'))
        <span class="help-block">
          <strong>{{ $errors->first('password') }}</strong>
        </span>
      @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    {{ Form::label('password_confirmation', __('auth.confirm') . ' (*)', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::password('password_confirmation', array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.confirm'))) }}
      @if ($errors->has('password_confirmation'))
        <span class="help-block">
          <strong>{{ $errors->first('password_confirmation') }}</strong>
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
