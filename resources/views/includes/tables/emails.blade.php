<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th></th>
      <th>{{ __($name . '.table.from') }}</th>
      <th class="col-sm-12">{{ __($name . '.table.subject') }}</th>
      <th>{{ __($name . '.table.date') }}</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @forelse ($resources as $resource)
        <td class="text-nowrap">
          @if ($resource->recipients->where('id', Auth::id())->first()->pivot->is_read === 0)
            <label class="label label-success">
                <i class="fa fa-envelope"></i>
            </label>
          @else
            <label class="label label-default">
              <i class="fa fa-envelope-open"></i>
            </label>
          @endif
        </td>
        <td class="mailbox-name text-nowrap">
          <a href="{{ route($name . '.show', $resource->id) }}">{{ $resource->user->name }}</a>
        </td>
        <td>{{ $resource->subject }}</td>
        <td class="text-nowrap">{{ $resource->created_at->diffForHumans() }}</td>
        <td>
          {{ Form::open(['method' => 'DELETE','route' => [$name . '.destroy', $resource->id]]) }}
            {{ Form::button('<i class="fa fa-trash"></i>', array(
              'type' => 'submit',
              'class'=> 'btn-danger btn-xs',
              'onclick'=>'return confirm("' . __($name . '.confirm-trash') . '")'
            )) }}
          {{ Form::close() }}
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="5"><span class="col-sm-offset-1">{{ __('emails.table-empty') }}</span></td>
      </tr>
    @endforelse
  </tbody>
</table>
<div class="col-sm-12">
  <div class="text-right">{{ $resources->links() }}</div>
</div>