<div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
  {{ Form::label($input, __($name . '.table.' . $input) . ' (*)', array('class' => 'col-sm-4 control-label')) }}
  <div class="col-sm-8">
    {{ Form::number($input, $value, array('class' => 'col-sm-12 control-form', 'placeholder' => __($name . '.table.' . $input))) }}
    @if ($errors->has($input))
    <span class="help-block">
      <strong>{{ $errors->first($input) }}</strong>
    </span>
    @endif
  </div>
</div>
