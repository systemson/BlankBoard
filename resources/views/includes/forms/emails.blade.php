@if (isset($new) && $new)
{{ Form::open(array('url' => route($name . '.store'), 'method' => 'POST', 'class' => 'form-horizontal')) }}
@else
{{ Form::open(array('url' => route($name . '.update', $resource->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
@endif

  <div class="col-sm-12 form-horizontal">


  <div class="form-group">
    <div class="col-sm-12 text-right">
      <button class="{{ __('messages.btn.send.class') }}"><i class="fa fa-envelope-o"></i> {{ __('messages.btn.send.name') }}</button>
    </div>
  </div>


    <div class="form-group">
      {{ Form::select('to[]', \App\Http\Models\User::all()->except(Auth::id())->pluck('name','id'), $resource->user_id ?? null, array('class' => 'control-form chosen-select', 'rows' => '4', 'multiple' => 'multiple')) }}
    </div>

    <div class="form-group">
      {{ Form::text('subject', $resource->subject ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => 'Subject')) }}
    </div>

    <div class="form-group">
      {{ Form::textarea('body', $resource->body ?? null, array('class' => 'col-sm-12 control-form')) }}
    </div>

  </div>


{{ Form::close() }}

