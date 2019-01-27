@extends('layouts.admin')

@section('title', config('app.name', 'Laravel'))

@section('content')
<section class="content container-fluid">

  <div class="col-sm-offset-2 col-sm-8">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{ __('auth.register') }}</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" type="button" data-widget="collapse">
            <i class="fa fa-minus"></i>
          </button>
        </div>
      </div><!-- Box header -->

      <div class="box-body">
        {!! Form::open(array('url' => route('register'), 'method' => 'POST', 'class' => 'form-horizontal')) !!}

          <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            {{ Form::label('username', __('auth.username') . ' (*)', array('class' => 'col-sm-4 control-label')) }}
            <div class="col-sm-6">
              {{ Form::text('username', old('username'), array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.username') )) }}
              @if ($errors->has('username'))
                <span class="help-block">
                  <strong>{{ $errors->first('username') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {{ Form::label('name', __('auth.name') . ' (*)', array('class' => 'col-sm-4 control-label')) }}
            <div class="col-sm-6">
              {{ Form::text('name', old('name'), array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.name') )) }}
              @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {{ Form::label('email', __('auth.email') . ' (*)', array('class' => 'col-sm-4 control-label')) }}
            <div class="col-sm-6">
              {{ Form::text('email', old('email'), array('class' => 'col-sm-12 control-form', 'placeholder' => __('auth.email'))) }}
              @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {{ Form::label('password', __('auth.password') . ' (*)', array('class' => 'col-sm-4 control-label')) }}
            <div class="col-sm-6">
              {{ Form::password('password', array('class' => 'col-sm-12 control-form')) }}
              @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            {{ Form::label('password-confirm', __('auth.confirm') . ' (*)', array('class' => 'col-sm-4 control-label')) }}
            <div class="col-sm-6">
              {{ Form::password('password_confirmation', array('class' => 'col-sm-12 control-form')) }}
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
              {{ Form::submit(__('auth.register'), array('class' => 'btn btn-primary')) }}
            </div>
          </div>

        {{ Form::close() }}

         <div class="col-sm-12 text-center">
           <a class="btn btn-link" href="{{ route('login') }}">{{ __('auth.registered') }}</a>
         </div>

      </div>
    </div>
  </div>

@endsection
