@if (isset($new) && $new)
{{ Form::open(array('url' => route($name . '.store'), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true)) }}
{{ Form::hidden('created_by', auth()->user()->id) }}
@else
{{ Form::open(array('url' => route($name . '.update', $resource->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true)) }}
@endif

{{ Form::hidden('updated_by', auth()->user()->id) }}

  <div class="form-group">
    <div class="col-sm-12 text-right">
      {{ Form::submit(__('messages.btn.save.name'), array('class' => __('messages.btn.save.class'))) }}
      {{ Form::reset(__('messages.btn.reset.name'), array('class' => __('messages.btn.reset.class'))) }}
    </div>
  </div>

  <div class="col-sm-8 form-horizontal">

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
      {{ Form::label('title', __($name . '.table.title') . ' (*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('title', $resource->title ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => __($name . '.table.title'))) }}
        @if ($errors->has('title'))
          <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
          </span>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
      {{ Form::label('url', __($name . '.table.url') . ' (*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('url', $resource->url ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => __($name . '.table.url'))) }}
        @if ($errors->has('url'))
          <span class="help-block">
            <strong>{{ $errors->first('url') }}</strong>
          </span>
        @endif
      </div>
    </div>

  </div>

  <div class="col-sm-4 form-vertical">

    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
      {{ Form::select('status', [1 => __('messages.status.1.name'), 0 => __('messages.status.0.name'), -4 => __('messages.status.-4.name'),
        ], $resource->status ?? null, array('class' => 'control-form chosen-select')) }}
      @if ($errors->has('status'))
        <span class="help-block">
          <strong>{{ $errors->first('status') }}</strong>
        </span>
      @endif
    </div>

  </div>

  <div class="col-sm-offset-3 col-sm-9">
    <div class="form-group">
      <p class="text-red"><strong>{{ __('messages.required-fields') }}</strong></p>
    </div>
  </div>

{{ Form::close() }}

