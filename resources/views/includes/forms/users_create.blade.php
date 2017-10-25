{{ Form::open(array('url' => route('users.store'), 'method' => 'POST', 'class' => 'form-horizontal')) }}

  <div class="form-group">
    <div class="col-sm-12 text-right">
      {{ Form::submit(__('messages.btn.save.name'), array('class' => __('messages.btn.save.class'))) }}
      {{ Form::reset(__('messages.btn.reset.name'), array('class' => __('messages.btn.reset.class'))) }}
    </div>
  </div>

  <div class="col-sm-8 form-horizontal">

    <div class="form-group">
      {{ Form::label('user', __('auth.username') . ' (*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('user', null, array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.username'))) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('name', __('auth.name') . ' (*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('name', null, array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.name'))) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('email', __('auth.email') . ' (*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('email', null, array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.email'))) }}
      </div>
    </div>

  </div>

  <div class="col-sm-4 form-vertical">

    <div class="form-group">
      {{ Form::select('status', [1 => __('auth.active'), 0 => __('auth.inactive')], null, array('class' => 'control-form chosen-select')) }}
    </div>

    <div class="form-group">
      {{ Form::label('roles', 'Roles', array('class' => 'control-label')) }}
      {{ Form::select('roles[]', \App\Http\Models\Role::pluck('name','id'), null, array('class' => 'control-form chosen-select', 'rows' => '4', 'multiple' => 'multiple')) }}
    </div>

  </div>

{{ Form::close() }}
