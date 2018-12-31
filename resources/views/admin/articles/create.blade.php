@extends('layouts.admin')

@section('title', config('app.name', 'Laravel') . ' - ' .  __($name . '.title'))

@section('styles')
<!-- Include Editor style. -->
<link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
@stop

@section('content-header')
<!-- Content header (Page header) -->
  @include('admin.includes.content-header', ['name' => $name, 'before' => [['name' => __('messages.admin-site'), 'route' => 'admin'], __($name . '.parent')], 'after' => [__('messages.new')]])
<!-- /. content header -->
@stop

@section('content')
<div class="col-sm-12">

  <div class="box box-primary">

    <div class="box-header with-border">
      <h3 class="box-title">{{ __($name . '.add', ['name' => trans_choice($name . '.name', 1)]) }}</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" type="button" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div><!-- /. box header -->

    <div class="box-body">
      @include('admin.includes.forms.' . $name, ['new' => 'true'])
    </div><!-- /. box body -->

  </div><!-- /. box -->

</div><!-- /. col -->
@stop

@section('scripts')
<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/js/froala_editor.pkgd.min.js"></script>

<!-- Initialize the editor. -->
<script>
  jQuery(function() {
    jQuery('#content').froalaEditor()
  });
</script>
@stop