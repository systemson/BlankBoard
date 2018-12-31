{{ Form::open(array('url' => route('users.update', $resource->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}

  {{ Form::hidden('form', 'user-update') }}

  <div class="form-group">
    <div class="col-sm-12 text-right">
      {{ Form::submit(__('messages.btn.save.name'), array('class' => __('messages.btn.save.class'))) }}
      {{ Form::reset(__('messages.btn.reset.name'), array('class' => __('messages.btn.reset.class'))) }}
    </div>
  </div>

  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    {{ Form::label('username', __('auth.username') . ' (*)', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::text('username', $resource->username, array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.username'))) }}
      @if ($errors->has('username'))
        <span class="help-block">
          <strong>{{ $errors->first('username') }}</strong>
        </span>
      @endif
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

  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {{ Form::label('email', __('auth.email') . ' (*)', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::text('email', $resource->email, array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.email'))) }}
      @if ($errors->has('email'))
        <span class="help-block">
          <strong>{{ $errors->first('email') }}</strong>
        </span>
      @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    {{ Form::label('status', __('auth.status'), array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::select('status', [1 => __('auth.active'), 0 => __('auth.inactive')], $resource->status, array('class' => 'col-sm-12 control-form chosen-select')) }}
      @if ($errors->has('status'))
        <span class="help-block">
          <strong>{{ $errors->first('status') }}</strong>
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

  @if (Auth::user()->hasPermission('create_users|update_users'))
  <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
    {{ Form::label('roles', __('auth.roles'), array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::select('roles[]', \app\Models\Role::pluck('name','id'), $resource->roles, array('class' => 'col-sm-12 control-form chosen-select', 'rows' => '4', 'multiple' => 'multiple')) }}
      @if ($errors->has('roles'))
        <span class="help-block">
          <strong>{{ $errors->first('roles') }}</strong>
        </span>
      @endif
    </div>
  </div>
  @endif

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <p class="text-red"><strong>{{ __('messages.required-fields') }}</strong></p>
    </div>
  </div>

{{ Form::close() }}
