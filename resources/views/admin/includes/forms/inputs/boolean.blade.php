@section('styles')
    @parent

  <style type="text/css">
    .btn-outline-success:not(:disabled):not(.disabled).active,
    .btn-outline-success:not(:disabled):not(.disabled):active {
      color: #fff;
      background-color: #28a745;
      border-color: #28a745;
    }
    .btn-outline-danger:not(:disabled):not(.disabled).active,
    .btn-outline-danger:not(:disabled):not(.disabled):active {
      color: #fff;
      background-color: #dc3545;
      border-color: #dc3545;
    }
    .btn-outline-success:not(:disabled):not(.disabled):not(.active),
    .btn-outline-success:not(:disabled):not(.disabled):not(.active) {
      border-color: #28a745;
    }
    .btn-outline-danger:not(:disabled):not(.disabled):not(.active),
    .btn-outline-danger:not(:disabled):not(.disabled):not(.active) {
      border-color: #dc3545;
    }
  </style>
@endsection

<div class="form-group{{ $errors->has($input) ? ' has-error' : '' }}">
  <div class="btn-group btn-group-toggle col-sm-12">

  {{ Form::label($input, $title, array('class' => 'col-sm-4 control-label')) }}
    
  <div class="col-sm-8" data-toggle="buttons">
    <label class="btn btn-outline-success col-sm-6 {{ $value ? 'active' : null}}">
      {{ Form::radio($input, 1, $value) }}
      Yes
    </label>
    <label class="btn btn-outline-danger col-sm-6 {{ !$value ? 'active' : null}}">
      {{ Form::radio($input, 0, !$value) }}
      No
    </label>
    @if ($errors->has($input))
    <span class="help-block">
      <strong>{{ $errors->first($input) }}</strong>
    </span>
    @endif
  </div>
  </div>
</div>
