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
      {{ Form::label('module', 'Module (*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('module', $resource->module ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => 'Module')) }}
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
{{ Form::close() }}
