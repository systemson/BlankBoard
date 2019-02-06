<div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
  {{ Form::label($input, $title, array('class' => 'col-sm-4 control-label')) }}
  <div class="col-sm-8">
    {{ Form::text($input, $value, array('class' => 'col-sm-12 control-form', 'placeholder' => __($name . '.table.' . $input))) }}
    @if ($errors->has($input))
    <span class="help-block">
      <strong>{{ $errors->first($input) }}</strong>
    </span>
    @endif
  </div>
</div>


@section('scripts')
    @parent

<script type="text/javascript" src="/js/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/jquery-ui.min.css">
  <script>
    jQuery( "#{{ $input }}" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  </script>
@endsection