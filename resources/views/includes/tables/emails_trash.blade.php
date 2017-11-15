<table class="table table-hover table-bordered table-striped">
  <thead>
    <tr>
      <th>{{ __($name . '.table.from') }}</th>
      <th class="col-sm-12">{{ __($name . '.table.subject') }}</th>
      <th>{{ __($name . '.table.date') }}</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @forelse ($resources as $resource)
      <tr>
        <td class="mailbox-name text-nowrap">
          <a href="{{ route($name . '.edit', $resource->id) }}">
            {{ $resource->user->name }}
          </a>
        </td>
        <td>{{ $resource->subject }}</td>
        <td class="text-nowrap">{{ $resource->created_at->diffForHumans() }}</td>
        <td>
          {{ Form::open(['method' => 'DELETE','route' => [$name . '.destroy', $resource->id]]) }}
            {{ Form::button('<i class="fa fa-trash"></i>', array(
              'type' => 'submit',
              'class'=> 'btn-danger btn-xs',
              'onclick'=>'return confirm("' . __($name . '.confirm-delete') . '")'
            )) }}
          {{ Form::close() }}
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="4"><span class="col-sm-offset-1">Your inbox is empty</span></td>
      </tr>
    @endforelse
  </tbody>
</table>
<div class="col-sm-12">
  <div class="text-right">{{ $resources->links() }}</div>
</div>