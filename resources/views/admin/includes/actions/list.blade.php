<div class="col-sm-12">
  <div class="box box-primary">

    <div class="box-header with-border">
      <h3 class="box-title">{{ __($module->slug . '.list', ['title' => trans_choice($module->slug . '.name', 2)]) }}</h3>
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

        <table class="table table-hover table-bordered table-striped table-condensed">
          <thead>
            <tr class="info">
              @foreach ($module->getListable() as $column)
              @th
              @endforeach
              <th class="text-center">{{ __($module->slug . '.table.action') }}</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($resources as $resource)
            <tr>
              @foreach ($module->getListable() as $column)
              @td
              @endforeach
              <td class="text-nowrap text-center">

                @if ($module->can_read)
                @permission('view_' . $module->slug)
                {!! show_btn($resource->id, $module->slug) !!}
                @endif
                @endif

                @if ($module->can_update)
                @permission('update_' . $module->slug)
                {!! edit_btn($resource->id, $module->slug) !!}
                @endif
                @endif

                @if ($module->can_delete)
                @permission('delete_' . $module->slug)
                {!! delete_btn($resource->id, $module->slug) !!}
                @endif
                @endif

              </td>
            </tr>
            @empty
            <tr><td colspan="{{ count($module->getListable()) + 1 }}">{{ __('messages.no-results') }}</td></tr>
            @endforelse

          </tbody>
        </table>
      </div>

      <div class="col-sm-12">
        <div class="text-right">{{ $resources->links() }}</div>
      </div>

    </div><!-- /. box body -->

  </div><!-- /. box -->

</div><!-- /. col -->