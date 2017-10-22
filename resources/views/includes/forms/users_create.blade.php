<div class="col-sm-12">
  <p>(*) Campos obligatorios.</p>
</div>

{!! Form::open(array('url' => route($name . '.store'), 'method' => 'POST', 'class' => 'form-horizontal')) !!}

  <div class="col-sm-8 form-horizontal">

    <div class="form-group">
      {{ Form::label('user', 'User (*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('user', null, array('class' => 'col-sm-12 control-form', 'placeholder' => 'User')) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('name', 'Name (*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('name', null, array('class' => 'col-sm-12 control-form', 'placeholder' => 'Name')) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('last_name', 'Last name', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('last_name', null, array('class' => 'col-sm-12 control-form', 'placeholder' => 'Last name')) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('email', 'Email (*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('email', null, array('class' => 'col-sm-12 control-form', 'placeholder' => 'Email')) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('description', 'Description', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::textarea('description', $resource->description ?? null, array('class' => 'col-sm-12 control-form', 'rows' => '4')) }}
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-4 col-sm-8">
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

    <div class="form-group">
      {{ Form::label('roles', 'Roles', array('class' => 'control-label')) }}
      {{ Form::select('roles[]', \App\Http\Models\Role::pluck('name','id'), null, array('class' => 'control-form chosen-select', 'rows' => '4', 'multiple' => 'multiple')) }}
    </div>

  </div>

{{ Form::close() }}
