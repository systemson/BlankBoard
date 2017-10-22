<div class="col-sm-12">
  <p>(*) Campos obligatorios.</p>
</div>

@if (isset($new) && $new)
{{ Form::open(array('url' => route($name . '.store'), 'method' => 'POST', 'class' => 'form-horizontal')) }}
@else
{{ Form::open(array('url' => route($name . '.update', $resource->id), 'method' => 'PUT')) }}
@endif

  <div class="col-sm-8 form-horizontal">

    <div class="form-group">
      {{ Form::label('name', 'Name (*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('name', $resource->name ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => 'Name')) }}
      </div>
    </div>

    <div class="form-group">
      {{ Form::label('slug', 'Slug (*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('slug', $resource->slug ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => 'Slug')) }}
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
      {{ Form::label('permissions', 'Permissions', array('class' => 'control-label')) }}
      {{ Form::select('permissions[]', \App\Http\Models\Permission::pluck('name','id'), $resource->permissions ?? null, array('class' => 'control-form chosen-select', 'rows' => '4', 'multiple' => 'multiple')) }}
    </div>

  </div>

{{ Form::close() }}
