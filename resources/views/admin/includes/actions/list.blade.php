<div class="col-sm-12">
  <div class="box box-primary">

    <div class="box-header with-border">
      <h3 class="box-title">{{ __('messages.resource.list', ['name' => trans_choice($module->slug . '.name', 2)]) }}</h3>
      <div class="box-tools pull-right">
        @if ($module->can_create)
        @permission('create_' . $module->slug)
        <?php $create_query_params = isset($create_query_params) ? '?' . http_build_query($create_query_params) : ''; ?>
        {!! button('new', route($module->slug . '.create').$create_query_params) !!}
        @endif
        @endif
        <button class="btn btn-box-tool" type="button" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div><!-- Box header -->

    <div class="box-body">
      <div class="table-responsive">
      	{{ $resources->list('', ['module' => $module]) }}
      </div>

      <div class="col-sm-12">
        <div class="text-right">{{ $resources->links() }}</div>
      </div>

    </div><!-- /. box body -->

  </div><!-- /. box -->

</div><!-- /. col -->