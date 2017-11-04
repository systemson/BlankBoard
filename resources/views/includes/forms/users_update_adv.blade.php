{{ Form::open(array('url' => route('users.update', $resource->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}

  <div class="form-group">
    <div class="col-sm-12 text-right">
      {{ Form::submit(__('messages.btn.save.name'), array('class' => __('messages.btn.save.class'))) }}
      {{ Form::reset(__('messages.btn.reset.name'), array('class' => __('messages.btn.reset.class'))) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('user', __('auth.username') . ' (*)', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::text('user', $resource->user, array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.username'))) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('name', __('auth.name') . ' (*)', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::text('name', $resource->name, array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.name'))) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('last_name', __('auth.lastname'), array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::text('last_name', $resource->last_name, array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.lastname'))) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('email', __('auth.email') . ' (*)', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::text('email', $resource->email, array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.email'))) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('status', __('auth.status'), array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::select('status', [1 => __('auth.active'), 0 => __('auth.inactive')], $resource->status, array('class' => 'col-sm-12 control-form chosen-select')) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('description', __('auth.description'), array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::textarea('description', $resource->description, array('class' => 'col-sm-12 control-form', 'rows' => '4')) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('roles', __('auth.roles'), array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::select('roles[]', \app\Http\Models\Role::pluck('name','id'), $resource->roles, array('class' => 'col-sm-12 control-form chosen-select', 'rows' => '4', 'multiple' => 'multiple')) }}
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <p class="text-red"><strong>{{ __('messages.required_fields') }}</strong></p>
    </div>
  </div>

{{ Form::close() }}
