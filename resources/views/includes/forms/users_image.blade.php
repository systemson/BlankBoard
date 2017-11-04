{{ Form::open(array('url' => route('users.update', $resource->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'files'=>true)) }}

  <div class="form-group">
    <div class="col-sm-12 text-right">
      {{ Form::submit(__('messages.btn.save.name'), array('class' => __('messages.btn.save.class'))) }}
      {{ Form::reset(__('messages.btn.reset.name'), array('class' => __('messages.btn.reset.class'))) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('user', __('auth.avatar'), array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::file('avatar') }}
    </div>
  </div>

{{ Form::close() }}
