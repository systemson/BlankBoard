@section('styles')
<!-- Include Editor style. -->
<link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@stop

@if (isset($new) && $new)
{{ Form::open(array('url' => route($name . '.store'), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true)) }}
{{ Form::hidden('created_by', auth()->user()->id) }}
@else
{{ Form::open(array('url' => route($name . '.update', $resource->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true)) }}
@endif

{{ Form::hidden('updated_by', auth()->user()->id) }}

  <div class="form-group">
    <div class="col-sm-12 text-right">
      {{ Form::submit(__('messages.btn.save.name'), array('class' => __('messages.btn.save.class'))) }}
      {{ Form::reset(__('messages.btn.reset.name'), array('class' => __('messages.btn.reset.class'))) }}
    </div>
  </div>

  <div class="col-sm-8 form-horizontal">

    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
      {{ Form::label('title', __($name . '.table.title') . ' (*)', array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('title', $resource->title ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => __($name . '.table.title'))) }}
        @if ($errors->has('title'))
          <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
          </span>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('image_file') ? ' has-error' : '' }}">
      {{ Form::label('image_file', __($name . '.table.image_file') , array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::file('image_file', ['accept' => 'image/*']) }}
        @if ($errors->has('image_file'))
          <span class="help-block">
            <strong>{{ $errors->first('image_file') }}</strong>
          </span>
        @endif
      </div>
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
      {{ Form::label('description', __($name . '.table.description'), array('class' => 'col-sm-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::textarea('description', $resource->description ?? null, array('class' => 'col-sm-12 control-form', 'rows' => '4')) }}
        @if ($errors->has('description'))
          <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
          </span>
        @endif
      </div>
    </div>

  </div>

  <div class="col-sm-4 form-vertical">

    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
      {{ Form::select('status', [1 => __('messages.status.1.name'), 0 => __('messages.status.0.name'), -4 => __('messages.status.-4.name'),
        ], $resource->status ?? null, array('class' => 'control-form chosen-select')) }}
      @if ($errors->has('status'))
        <span class="help-block">
          <strong>{{ $errors->first('status') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('url_alias') ? ' has-error' : '' }}">
      {{ Form::label('url_alias', __($name . '.table.url_alias'), array('class' => 'control-label')) }}
      {{ Form::text('url_alias', $resource->url_alias ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => __($name . '.table.url_alias'), 'readonly')) }}
      @if ($errors->has('url_alias'))
      <span class="help-block">
        <strong>{{ $errors->first('url_alias') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('author_alias') ? ' has-error' : '' }}">
      {{ Form::label('author_alias', __($name . '.table.author_alias'), array('class' => 'control-label')) }}
      {{ Form::text('author_alias', $resource->author_alias ?? null, array('class' => 'col-sm-12 control-form', 'placeholder' => __($name . '.table.author_alias'))) }}
      @if ($errors->has('author_alias'))
      <span class="help-block">
        <strong>{{ $errors->first('author_alias') }}</strong>
        </span>
      @endif
    </div>

    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
      {{ Form::label('category_id', __($name . '.table.category_id'), array('class' => 'control-label')) }}
      {{ Form::select('category_id', \App\Models\Category::pluck('name', 'id'), $resource->category_id ?? null, array('class' => 'control-form chosen-select')) }}
      @if ($errors->has('category_id'))
        <span class="help-block">
          <strong>{{ $errors->first('category_id') }}</strong>
        </span>
      @endif
    </div>

  </div>

  <div class="col-sm-12 form-vertical">

    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
      {{ Form::label('content', __($name . '.table.content') . ' (*)', array('class' => 'control-label')) }}
        {{ Form::textarea('content', $resource->content ?? null, array('class' => 'col-sm-12 control-form')) }}
        @if ($errors->has('content'))
          <span class="help-block">
            <strong>{{ $errors->first('content') }}</strong>
          </span>
        @endif
    </div>

  </div>

  <div class="col-sm-offset-3 col-sm-9">
    <div class="form-group">
      <p class="text-red"><strong>{{ __('messages.required-fields') }}</strong></p>
    </div>
  </div>

{{ Form::close() }}

@section('scripts')
<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/js/froala_editor.pkgd.min.js"></script>

<!-- Initialize the editor. -->
<script>
  jQuery(function() {
    jQuery('#content').froalaEditor()
  });
</script>
  <script type="text/javascript">
    jQuery('#title').change(function () {
      var value = jQuery(this).val();
      value = value.split(' ').join('-').toLowerCase();

      jQuery('#url_alias').val(value);
    });
  </script>
@stop
