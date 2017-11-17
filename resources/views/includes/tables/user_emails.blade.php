<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th></th>
      <th>{{ __('emails.table.from') }}</th>
      <th class="col-sm-12">{{ __('emails.table.subject') }}</th>
      <th>{{ __('emails.table.date') }}</th>
    </tr>
  </thead>
  <tbody>
    @forelse (Auth::user()->emails->slice(0,10)->all() as $resource)
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
        <td colspan="4"><span class="col-sm-offset-1">{{ __('emails.table-empty') }}</span></td>
      </tr>
    @endforelse
  </tbody>
</table>