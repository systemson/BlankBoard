{{ Form::open(array('url' => route('change.password', $resource->id), 'method' => 'PATCH', 'class' => 'form-horizontal')) }}

  <div class="form-group">
    <div class="col-sm-12 text-right">
      {{ Form::submit(__('messages.btn.save.name'), array('class' => __('messages.btn.save.class'))) }}
      {{ Form::reset(__('messages.btn.reset.name'), array('class' => __('messages.btn.reset.class'))) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('old_password', __('auth.old_password') . ' (*)', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::password('old_password', array('class' => 'col-sm-12 control-form', 'placeholder' => 'Old password')) }}
    </div>
  </div>

  <hr>

  <div class="form-group">
    {{ Form::label('password', __('auth.new_password') . ' (*)', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::password('password', array('class' => 'col-sm-12 control-form', 'placeholder' => 'New password')) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('confirm_password', __('auth.confirm') . ' (*)', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::password('confirm_password', array('class' => 'col-sm-12 control-form', 'placeholder' => 'Confirm password')) }}
    </div>
  </div>

{{ Form::close() }}
