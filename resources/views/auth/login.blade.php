@extends('layouts.admin')

@section('title', config('app.name', 'Laravel'))

@section('content')
<div class="col-sm-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">{{ __('auth.login') }}</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" type="button" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div><!-- Box header -->

    <div class="box-body">
      {!! Form::open(array('url' => route('login'), 'method' => 'POST', 'class' => 'form-horizontal')) !!}

      <div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
        {{ Form::label('user', __('auth.username'), array('class' => 'col-sm-4 control-label')) }}
        <div class="col-sm-6">
          {{ Form::text('user', old('user'), array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.username') )) }}
          @if ($errors->has('user'))
          <span class="help-block">
            <strong>{{ $errors->first('user') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        {{ Form::label('password', __('auth.password'), array('class' => 'col-sm-4 control-label')) }}
        <div class="col-sm-6">
          {{ Form::password('password', array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.password') )) }}
          @if ($errors->has('password'))
          <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-6">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('auth.remember') }}
            </label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
          {{ Form::submit(__('auth.login'), array('class' => 'btn btn-primary')) }}
          <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('auth.forgot') }}</a>
        </div>
      </div>

      {{ Form::close() }}

      <div class="col-sm-12 text-center">
       <a class="btn btn-link" href="{{ route('register') }}">{{ __('auth.unregistered') }}</a>
     </div>

    </div><!-- /. box body -->

  </div><!-- /. box -->

</div><!-- /. col -->
@endsection
