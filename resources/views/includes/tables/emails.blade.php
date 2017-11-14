<table class="table table-hover table-bordered table-striped">
  <thead>
    <tr>
      <th></th>
      <th>{{ __($name . '.table.from') }}</th>
      <th class="col-sm-12">{{ __($name . '.table.subject') }}</th>
      <th>{{ __($name . '.table.date') }}</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($resources as $resource)
      <tr>
        @if ($resource->status == 1)
          <td>
            <label class="{{ __('messages.status.' . $resource->status. '.class') }}">
              <i class="fa fa-envelope"></i>
            </label>
          </td>
        @else
          <td>
            <label class="label label-default">
              <i class="fa fa-envelope-open"></i>
            </label>
          </td>
        @endif
        <td class="mailbox-name text-nowrap">{{ $resource->user->name }}</td>
        <td><a href="{{ route($name . '.show', $resource->id) }}">{{ $resource->subject }}</a></td>
        <td class="text-nowrap">{{ $resource->created_at->diffForHumans() }}</td>
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