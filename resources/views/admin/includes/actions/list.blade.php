<div class="col-sm-12">
  <div class="box box-primary">

    <div class="box-header with-border">
      <h3 class="box-title">{{ __($module->slug . '.list', ['title' => __($module->slug . '.title')]) }}</h3>
      <div class="box-tools pull-right">
        @if ($module->can_create)
        @permission('create_' . $module->slug)
        {!! button('new', route($module->slug . '.create')) !!}
        @endif
        @endif
        <button class="btn btn-box-tool" type="button" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div><!-- Box header -->

    <div class="box-body">
      <div class="table-responsive">
        
        <table class="table table-hover table-bordered">
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
            <tr><td colspan="{{ count($module->getListable()) }}">{{ __('messages.no-results') }}</td></tr>
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