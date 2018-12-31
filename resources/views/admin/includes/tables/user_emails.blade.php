<table class="table">
@forelse (Auth::user()->emails->slice(0,10)->all() as $resource)
  <tr>
    <td>
      {{ $resource->user->name }}
    </td>
    <td class="col-sm-12">
      <a href="{{ route('emails.show', $resource->id) }}">
        {{ str_limit($resource->subject, 30) }}
      </a>
      <small>{{ str_limit($resource->body, 20) }}</small>
    </td>
    <td class="text-nowrap">
      <i class="fa fa-clock-o"></i> {{ $resource->created_at->diffForHumans() }}
    </td>
  </tr>
@empty
  <tr>
    <td>
      {{ __('emails.table-empty') }}
    </td>
  </tr>
@endforelse
</table>
