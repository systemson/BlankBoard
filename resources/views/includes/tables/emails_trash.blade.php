<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th>{{ __($name . '.table.from') }}</th>
      <th class="col-sm-12">{{ __($name . '.table.subject') }}</th>
      <th>{{ __($name . '.table.date') }}</th>
      <th colspan="2"></th>
    </tr>
  </thead>
  <tbody>
    @forelse ($resources as $resource)
      <tr>
        <td class="mailbox-name text-nowrap">
          <a href="{{ route($name . '.show', $resource->id) }}">
            {{ $resource->user->name }}
          </a>
        </td>
        <td>{{ $resource->subject }}</td>
        <td class="text-nowrap">{{ $resource->created_at->diffForHumans() }}</td>
        <td>
          {{ Form::open(['method' => 'PATCH','route' => [$name . '.restore', $resource->id], 'class' => 'pull-right']) }}
            {{ Form::button('<i class="fa fa-undo"></i>', [
              'type' => 'submit',
              'class'=> 'btn-info btn-xs',
            ]) }}
          {{ Form::close() }}
        </td>
        <td>
          {{ Form::open(['method' => 'DELETE','route' => [$name . '.destroy', $resource->id], 'class' => 'pull-right']) }}
            {{ Form::button('<i class="fa fa-trash"></i>', [
              'type' => 'submit',
              'class'=> 'btn-danger btn-xs',
              'onclick'=>'return confirm("' . __($name . '.confirm-delete') . '")'
            ]) }}
          {{ Form::close() }}
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="6"><span class="col-sm-offset-1">{{ __('emails.table-empty') }}</span></td>
      </tr>
    @endforelse
  </tbody>
</table>