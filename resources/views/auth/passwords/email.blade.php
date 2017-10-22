@extends('layouts.default')

@section('title', config('app.name', 'Laravel'))

@section('content')
<section class="content container-fluid">

  <div class="col-sm-offset-2 col-sm-8">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">{{ __('auth.reset') }}</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" type="button" data-widget="collapse">
            <i class="fa fa-minus"></i>
          </button>
        </div>
      </div><!-- Box header -->

      <div class="box-body">
        {!! Form::open(array('url' => route('password.email'), 'method' => 'POST', 'class' => 'form-horizontal')) !!}

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

          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
              {{ Form::submit(__('auth.restore'), array('class' => 'btn btn-primary')) }}
            </div>
          </div>

        {{ Form::close() }}

         <div class="col-sm-12 text-center">
           <a class="btn btn-link" href="{{ route('register') }}">{{ __('auth.unregistered') }}</a>
         </div>

      </div>
    </div>
  </div>
@endsection
