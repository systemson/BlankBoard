{{ Form::open(array('url' => route('chance.password', $resource->id), 'method' => 'PATCH', 'class' => 'form-horizontal')) }}

  <div class="form-group">
    <div class="col-sm-12 text-right">
      {{ Form::submit('Save', array('class' => 'btn btn-success')) }}
      {{ Form::reset('Restart', array('class' => 'btn btn-default')) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('old_password', 'Old password (*)', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::password('old_password', array('class' => 'col-sm-12 control-form', 'placeholder' => 'Old password')) }}
    </div>
  </div>

  <hr>

  <div class="form-group">
    {{ Form::label('password', 'New password (*)', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::password('password', array('class' => 'col-sm-12 control-form', 'placeholder' => 'New password')) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('confirm_password', 'Confirm password (*)', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::password('confirm_password', array('class' => 'col-sm-12 control-form', 'placeholder' => 'Confirm password')) }}
    </div>
  </div>

{{ Form::close() }}
