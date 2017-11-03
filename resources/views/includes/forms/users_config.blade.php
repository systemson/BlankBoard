{{ Form::open(array('url' => route('settings.store', false), 'method' => 'PUT', 'class' => 'form-horizontal')) }}

  <div class="col-sm-8">

    <div class="form-group">
      {{ Form::label('register_users', __($name . '.setting.register'), array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('register_users', $resources['register_users'], array('class' => 'col-sm-12 control-form', 'placeholder' => 'Name')) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('create_users', __($name . '.setting.create'), array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('create_users', $resources['create_users'], array('class' => 'col-sm-12 control-form', 'placeholder' => 'Name')) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('deactivate_users', __($name . '.setting.deactivate'), array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('deactivate_users', $resources['deactivate_users'], array('class' => 'col-sm-12 control-form', 'placeholder' => 'Name')) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('first_login', __($name . '.setting.first_login'), array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('first_login', $resources['first_login'], array('class' => 'col-sm-12 control-form', 'placeholder' => 'Name')) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('change_password', __($name . '.setting.change_password'), array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('change_password', $resources['change_password'], array('class' => 'col-sm-12 control-form', 'placeholder' => 'Name')) }}
      </div>
    </div>

  </div>

{{ Form::close() }}

