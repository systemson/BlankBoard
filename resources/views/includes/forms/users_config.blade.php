{{ Form::open(array('url' => route('settings.store', false), 'method' => 'PUT', 'class' => 'form-horizontal')) }}

  <div class="col-sm-6">

    <div class="form-group">
      {{ Form::label('default_password', __($name . '.setting.default_password'), array('class' => 'col-sm-6 control-label')) }}
      <div class="col-sm-6">
        {{ Form::text('default_password', $resources['default_password'], array('class' => 'col-sm-12 control-form', 'placeholder' => __($name . '.setting.default_password'))) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('deactivate_users', __($name . '.setting.deactivate'), array('class' => 'col-sm-6 control-label')) }}
      <div class="col-sm-4">
        {{ Form::text('deactivate_users', $resources['deactivate_users'], array('class' => 'col-sm-12 control-form', 'placeholder' => __($name . '.setting.deactivate'))) }}
      </div>
      <div class="col-sm-2 control-label" style="text-align: left;">Days</div>
    </div>

    <div class="form-group">
      {{ Form::label('change_password', __($name . '.setting.change_password'), array('class' => 'col-sm-6 control-label')) }}
      <div class="col-sm-4">
        {{ Form::text('change_password', $resources['change_password'], array('class' => 'col-sm-12 control-form', 'placeholder' => __($name . '.setting.change_password'))) }}
      </div>
      <div class="col-sm-2 control-label" style="text-align: left;">Days</div>
    </div>

  </div>

  <div class="col-sm-6">

    <div class="form-group">
      {{ Form::label('new_users', __($name . '.setting.register'), array('class' => 'col-sm-6 control-label')) }}
      <div class="col-sm-6 text-center">
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-default @if ($resources['new_users'] == 1) active @endif">
            @lang('messages.yes') {{ Form::radio('new_users', $resources['new_users'] == 1, true) }}
          </label>
          <label class="btn btn-default @if ($resources['new_users'] == 0) active @endif">
            @lang('messages.no') {{ Form::radio('new_users', $resources['new_users'] == 0, false) }}
          </label>
        </div>
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('first_login', __($name . '.setting.first_login'), array('class' => 'col-sm-6 control-label')) }}
      <div class="col-sm-6 text-center">
        <div class="btn-group" data-toggle="buttons">
          <label class="btn btn-default @if ($resources['first_login'] == 1) active @endif">
            @lang('messages.yes') {{ Form::radio('first_login', $resources['first_login'] == 1, true) }}
          </label>
          <label class="btn btn-default @if ($resources['first_login'] == 0) active @endif">
            @lang('messages.no') {{ Form::radio('first_login', $resources['first_login'] == 0, false) }}
          </label>
        </div>
      </div>
    </div>

  </div>

{{ Form::close() }}

