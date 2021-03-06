@extends('layouts.admin')

@section('title', config('app.name', 'Laravel') . ' - ' . __($name . '.title'))

@section('content-header')
<!-- Content header (Page header) -->
  @include('admin.includes.content-header', ['name' => $name, 'before' => [['name' => __('messages.admin-site'), 'route' => 'admin'], __($name . '.parent')], 'after' => [__('messages.edit')]])
<!-- /. content header -->
@stop

@section('content')
<div class="col-sm-12">

  <div class="box box-primary">

    <div class="box-header with-border">
      <h3 class="box-title">{{ __($name . '.edit', ['name' => trans_choice($name . '.name', 1), 'resource' => $resource->name ]) }}</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" type="button" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div><!-- /. box header -->

    <div class="box-body">
      @include('admin.includes.forms.' . $name, ['name' => $name])
    </div><!-- /. box body -->

  </div><!-- /. box -->

</div><!-- /. col -->

@include('admin.includes.actions.list', ['resources' => $resources, 'module' => $module, 'create_query_params' => ['menu_id' => $resource->id]])
@stop

@section('scripts')
  <script type="text/javascript">
    jQuery('#name').change(function () {
      var value = jQuery(this).val();
      value = value.split(' ').join('-').toLowerCase();

      jQuery('#slug').val(value);
    });
  </script>
@stop