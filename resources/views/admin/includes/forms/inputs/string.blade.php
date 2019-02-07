<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
  {{ Form::label($name, $title, array('class' => 'col-sm-4 control-label')) }}
  <div class="col-sm-8">
    {{ Form::text($name, $default, array('class' => 'col-sm-12 control-form', 'placeholder' => __($module . '.table.' . $name))) }}
    @if ($errors->has($name))
    <span class="help-block">
      <strong>{{ $errors->first($name) }}</strong>
    </span>
    @endif
  </div>
</div>
