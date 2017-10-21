<div class="col-sm-offset-3 col-sm-9">
  <p>(*) Campos obligatorios.</p>
  <p>Queda pendiente botón de "Activo" e "Inactivo".</p>
</div>
@if (isset($new) && $new)
{!! Form::open(array('url' => route($name . '.store'), 'method' => 'POST', 'class' => 'form-horizontal')) !!}
@else
{!! Form::open(array('url' => route($name . '.update', $resource->id), 'method' => 'PUT', 'class' => 'form-horizontal')) !!}
@endif

  <div class="form-group">
    {{ Form::label('user', 'User (*)', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::text('user', $resource->user ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => 'User')) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('name', 'Name (*)', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::text('name', $resource->name ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => 'Name')) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('last_name', 'Last name', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::text('last_name', $resource->last_name ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => 'Last name')) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('email', 'Email (*)', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::text('email', $resource->email ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => 'Email')) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('status', 'Status', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::select('status', [1 => 'Active', 0 => 'Inactive'], $resource->status ?? null, array('class' => 'col-sm-12 control-form chosen-select')) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('description', 'Description', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::textarea('description', $resource->description ?? null, array('class' => 'col-sm-12 control-form', 'rows' => '4')) }}
    </div>
  </div>

  <div class="form-group">
    {{ Form::label('roles', 'Roles', array('class' => 'col-sm-3 control-label')) }}
    <div class="col-sm-9">
      {{ Form::select('roles[]', \app\Http\Models\Role::pluck('name','id'), $resource->roles, array('class' => 'col-sm-12 control-form chosen-select', 'rows' => '4', 'multiple' => 'multiple')) }}
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <center>
        {{ Form::submit('Send', array('class' => 'btn btn-success')) }}
      </center>
    </div>
  </div>

{{ Form::close() }}
