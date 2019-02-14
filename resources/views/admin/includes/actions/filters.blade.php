<div class="col-sm-12">
  <div class="box box-default">

    <div class="box-header with-border">
      <h3 class="box-title">{{ __('messages.resource.filters', ['name' => trans_choice($module->slug . '.name', 2)]) }}</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" type="button" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div><!-- Box header -->

    <div class="box-body">

      {{ Form::open(['id' => 'filters-form', 'method' => 'GET']) }}
      <div class="row form-inline">
        <div class="col-sm-6">
          {{ Form::select('module', ['Select', 'Users', 'Roles'], [], ['class' => 'chosen-select', 'onchange' => 'this.form.submit();']) }}
        </div>
      </div>
      {{ Form::close() }}

    </div><!-- /. box body -->

  </div><!-- /. box -->

</div><!-- /. col -->