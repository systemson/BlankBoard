{{ Form::open(array('url' => route('users.store'), 'method' => 'POST', 'class' => 'form-horizontal')) }}

  <div class="form-group">
    <div class="col-sm-12 text-right">
      {{ Form::submit(__('messages.btn.save.name'), array('class' => __('messages.btn.save.class'))) }}
      {{ Form::reset(__('messages.btn.reset.name'), array('class' => __('messages.btn.reset.class'))) }}
    </div>
  </div>

  <div class="col-sm-8">

    <div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
      {{ Form::label('user', __('auth.username') . ' (*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('user', null, array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.username'))) }}
        @if ($errors->has('user'))
          <span class="help-block">
            <strong>{{ $errors->first('user') }}</strong>
          </span>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      {{ Form::label('name', __('auth.name') . ' (*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('name', null, array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.name'))) }}
        @if ($errors->has('name'))
          <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      {{ Form::label('email', __('auth.email') . ' (*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('email', null, array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.email'))) }}
        @if ($errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif
      </div>
    </div>

  </div>

  <div class="col-sm-4 form-vertical">

    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
      {{ Form::select('status', [1 => __('auth.active'), 0 => __('auth.inactive')], null, array('class' => 'control-form chosen-select')) }}
      @if ($errors->has('status'))
        <span class="help-block">
          <strong>{{ $errors->first('status') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
      {{ Form::label('roles', 'Roles', array('class' => 'control-label')) }}
      {{ Form::select('roles[]', \App\Models\Role::pluck('name','id'), null, array('class' => 'control-form chosen-select', 'rows' => '4', 'multiple' => 'multiple')) }}
      @if ($errors->has('roles'))
        <span class="help-block">
          <strong>{{ $errors->first('roles') }}</strong>
        </span>
      @endif
    </div>

  </div>

  <div class="col-sm-offset-3 col-sm-9">
    <div class="form-group">
      <p class="text-red"><strong>{{ __('messages.required_fields') }}</strong></p>
    </div>
  </div>

{{ Form::close() }}

