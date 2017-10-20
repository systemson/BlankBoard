<br>
{{ Form::open(array('url' => route($name . '.update', false), 'method' => 'PUT', 'class' => 'form-horizontal')) }}

  <div class="col-sm-6">

    <div class="form-group">
      {{ Form::label('1', 'Name', array('class' => 'col-sm-3 control-label')) }}
      <div class="col-sm-9">
        {{ Form::text('1', 'Value', array('class' => 'col-sm-12 control-form', 'placeholder' => 'Name')) }}
      </div>
    </div>

  </div>

  <div class="col-sm-6">

    <div class="form-group">
      {{ Form::label('1', 'Name', array('class' => 'col-sm-3 control-label')) }}
      <div class="col-sm-9">
        {{ Form::text('1', 'Value', array('class' => 'col-sm-12 control-form', 'placeholder' => 'Name')) }}
      </div>
    </div>

  </div>

{{ Form::close() }}

