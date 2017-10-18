@extends('layouts.default')

@section('title', config('app.name', 'Laravel'))

@section('content')
<section class="content container-fluid">

  <div class="row">
    <div class="col-sm-offset-2 col-xs-8">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Login</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" type="button" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div><!-- Box header -->

        <div class="box-body">
          {!! Form::open(array('url' => route('login'), 'method' => 'POST', 'class' => 'form-horizontal')) !!}

            <div class="form-group">
              {{ Form::label('email', 'Email', array('class' => 'col-sm-3 control-label')) }}
              <div class="col-sm-6">
                {{ Form::email('email', old('email'), array('class' => 'col-sm-12 control-form', 'placeholder' => 'Email')) }}
                @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
            </div>


            <div class="form-group">
              {{ Form::label('password', 'Password', array('class' => 'col-sm-3 control-label')) }}
              <div class="col-sm-6">
                {{ Form::password('password', array('class' => 'col-sm-12 control-form', 'placeholder' => 'Password')) }}
                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-6">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-6">
                {{ Form::submit('Login', array('class' => 'btn btn-primary')) }}
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  Forgot Your Password?
                </a>
              </div>
            </div>

          {{ Form::close() }}

        </div>
      </div>
    </div>
  </div>
</section>
@endsection
