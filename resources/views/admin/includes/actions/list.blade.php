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

    <div class="box-body no-padding">
      <table class="table table-hover table-bordered">
        <thead>
          <tr>
            @foreach ($module->getListable() as $column)
            <th>{{ __($module->slug . '.table.' . $column) }}</th>
            @endforeach
            <th>{{ __($module->slug . '.table.action') }}</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($resources as $resource)
          <tr>
            @foreach ($module->getListable() as $column)
            <td>{!! $resource[$column] !!}</td>
            @endforeach
            <td class="text-nowrap">

            @if ($module->can_update)
            @permission('update' . $module->slug)
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

      <div class="col-sm-12">
        <div class="text-right">{{ $resources->links() }}</div>
      </div>

    </div><!-- /. box body -->

  </div><!-- /. box -->

</div><!-- /. col -->