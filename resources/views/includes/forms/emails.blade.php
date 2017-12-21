@if (isset($new) && $new)
{{ Form::open(array('url' => route($name . '.store'), 'method' => 'POST', 'class' => 'form-horizontal')) }}
@else
{{ Form::open(array('url' => route($name . '.update', $resource->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
@endif

  <div class="col-sm-12 form-horizontal">


  <div class="form-group">
    <div class="col-sm-12 text-right">
      <button name="status" class="{{ __('messages.btn.send.class') }}" type="input" value="1"><i class="fa fa-envelope-o"></i> {{ __('messages.btn.send.name') }}</button>
      <button name="status" class="{{ __('messages.btn.draft.class') }}" type="input" value="0"><i class="fa fa-pencil"></i> {{ __('messages.btn.draft.name') }}</button>
    </div>
  </div>

    <div class="form-group{{ $errors->has('to') ? ' has-error' : '' }}">
      {{ Form::select('to[]', \App\Models\User::where('status', '>', 0)->get()->except(Auth::id())->pluck('name','id'), $message['to'], ['class' => 'control-form chosen-select', 'rows' => '4', 'multiple' => 'multiple']) }}
    </div>

    <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
      {{ Form::text('subject', $message['subject'], array('class' => 'col-sm-12 control-form', 'placeholder' => __($name . '.table.subject'))) }}
    </div>

    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
      {{ Form::textarea('body', $message['body'], array('class' => 'col-sm-12 control-form')) }}
    </div>

  </div>

{{ Form::close() }}
