@if (isset($new) && $new)
{{ Form::open(array('url' => route($name . '.store'), 'method' => 'POST', 'class' => 'form-horizontal')) }}
@else
{{ Form::open(array('url' => route($name . '.update', $resource->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
{{ Form::hidden('id', $resource->id) }}
@endif

  <div class="form-group">
    <div class="col-sm-12 text-right">
      {{ Form::submit(__('messages.btn.save.name'), array('class' => __('messages.btn.save.class'))) }}
      {{ Form::reset(__('messages.btn.reset.name'), array('class' => __('messages.btn.reset.class'))) }}
    </div>
  </div>

  <div class="col-sm-8 form-horizontal">

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      {{ Form::label('name', __($name . '.table.name') . '(*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('name', $resource->name ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => __($name . '.table.name'))) }}
        @if ($errors->has('name'))
          <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
      {{ Form::label('slug', __($name . '.table.slug') . ' (*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('slug', $resource->slug ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => __($name . '.table.slug'))) }}
        @if ($errors->has('slug'))
          <span class="help-block">
            <strong>{{ $errors->first('slug') }}</strong>
          </span>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
      {{ Form::label('description', __($name . '.table.description'), array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::textarea('description', $resource->description ?? null, array('class' => 'col-sm-12 control-form', 'rows' => '4')) }}
        @if ($errors->has('description'))
          <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
          </span>
        @endif
      </div>
    </div>

  </div>

  <div class="col-sm-4 form-vertical">

    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
      {{ Form::select('status', [1 => __('messages.status.1.name'), 0 => __('messages.status.0.name')], $resource->status ?? null, array('class' => 'control-form chosen-select')) }}
      @if ($errors->has('status'))
        <span class="help-block">
          <strong>{{ $errors->first('status') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('permissions') ? ' has-error' : '' }}">
      {{ Form::label('permissions', __($name . '.table.permissions'), array('class' => 'control-label')) }}
      {{ Form::select('permissions[]', \App\Models\Permission::where('status',1)->pluck('name','id'), $resource->permissions ?? null, array('class' => 'control-form chosen-select', 'rows' => '4', 'multiple' => 'multiple')) }}
      @if ($errors->has('permissions'))
        <span class="help-block">
          <strong>{{ $errors->first('permissions') }}</strong>
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

