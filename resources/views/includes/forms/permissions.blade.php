{{ Form::open(array('url' => route($name . '.update', $resource->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}

  <div class="form-group">
    <div class="col-sm-12 text-right">
      {{ Form::submit(__('messages.btn.save.name'), array('class' => __('messages.btn.save.class'))) }}
      {{ Form::reset(__('messages.btn.reset.name'), array('class' => __('messages.btn.reset.class'))) }}
    </div>
  </div>

  <div class="col-sm-8 form-horizontal">

    <div class="form-group">
      {{ Form::label('name', 'Name (*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('name', $resource->name ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => 'Name', 'disabled' => 'disabled')) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('slug', 'Slug (*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('slug', $resource->slug ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => 'Slug', 'disabled' => 'disabled')) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('module', 'Module', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('module', $resource->module ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => 'Module')) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('description', 'Description', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::textarea('description', $resource->description ?? null, array('class' => 'col-sm-12 control-form', 'rows' => '4', 'protected')) }}
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <center>
          {{ Form::submit('Send', array('class' => 'btn btn-success')) }}
        </center>
      </div>
    </div>
  </div>

  <div class="col-sm-4 form-vertical">

    <div class="form-group">
      {{ Form::select('status', [1 => 'Active', 0 => 'Inactive'], $resource->status ?? null, array('class' => 'control-form chosen-select')) }}
    </div>

  </div>

  <div class="col-sm-offset-3 col-sm-9">
    <div class="form-group">
      <p class="text-red"><strong>{{ __('messages.required_fields') }}</strong></p>
    </div>
  </div>

{{ Form::close() }}
