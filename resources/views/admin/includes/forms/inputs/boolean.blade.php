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

<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
  <div class="btn-group btn-group-toggle col-sm-12">

    <span class="col-sm-4 control-label"><b>{{ $title }}</b></span>
    
    <div class="col-sm-8" data-toggle="buttons">
      <label class="btn btn-sm btn-outline-success col-sm-6 {{ $default ? 'active' : null}}">
        {{ Form::radio($name, 1, $default) }}
        @lang('messages.yes')
      </label>
      <label class="btn btn-sm btn-outline-danger col-sm-6 {{ !$default ? 'active' : null}}">
        {{ Form::radio($name, 0, !$default) }}
        @lang('messages.no')
      </label>
      @if ($errors->has($name))
      <span class="help-block">
        <strong>{{ $errors->first($name) }}</strong>
      </span>
      @endif
    </div>
  </div>
</div>
