<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
  {{ Form::label($name, $title, array('class' => 'col-sm-4 control-label')) }}
  <div class="col-sm-8">
    {{ Form::text($name, $default, array('class' => 'col-sm-12 control-form')) }}
    @if ($errors->has($name))
    <span class="help-block">
      <strong>{{ $errors->first($name) }}</strong>
    </span>
    @endif
  </div>
</div>


@section('scripts')
    @parent

<script type="text/javascript" src="/js/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/jquery-ui.min.css">
  <script>
    jQuery( "#{{ $name }}" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  </script>
@endsection