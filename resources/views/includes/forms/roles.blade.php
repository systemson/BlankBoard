<div class="col-sm-offset-3 col-sm-9">
  <p>(*) Campos obligatorios.</p>
</div>
@if (isset($new) && $new)
{{ Form::open(array('url' => route($name . '.store'), 'method' => 'POST', 'class' => 'form-horizontal')) }}
@else
{{ Form::open(array('url' => route($name . '.update', $resource->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
@endif

            <div class="form-group">
              {{ Form::label('name', 'Name (*)', array('class' => 'col-sm-3 control-label')) }}
              <div class="col-sm-9">
                {{ Form::text('name', $resource->name ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => 'Name')) }}
              </div>
            </div>

            <div class="form-group">
              {{ Form::label('description', 'Description', array('class' => 'col-sm-3 control-label')) }}
              <div class="col-sm-9">
                {{ Form::textarea('description', $resource->description ?? null, array('class' => 'col-sm-12 control-form', 'rows' => '4')) }}
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
                <center>
                  {{ Form::submit('Send', array('class' => 'btn btn-success')) }}
                </center>
              </div>
            </div>

          </form>