{{ Form::open(array('url' => route('users.update', $resource->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'files'=>true)) }}

  {{ Form::hidden('form', 'avatar-update') }}

  <div class="form-group">
    <div class="col-sm-12 text-right">
      {{ Form::submit(__('messages.btn.save.name'), array('class' => __('messages.btn.save.class'))) }}
      {{ Form::reset(__('messages.btn.reset.name'), array('class' => __('messages.btn.reset.class'))) }}
    </div>
  </div>

  <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
    {{ Form::label('avatar', __('auth.avatar'), array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::file('avatar') }}
      @if ($errors->has('avatar'))
        <span class="help-block">
          <strong>{{ $errors->first('avatar') }}</strong>
        </span>
      @endif
    </div>
  </div>

{{ Form::close() }}
