<table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th>{{ __($name . '.table.id') }}</th>
      <th class="text-center">{{ __($name . '.table.action') }}</th>
      <th class="col-sm-6">{{ __($name . '.table.title') }}</th>
      <th class="text-center">{{ __($name . '.table.author') }}</th>
      <th class="text-center">{{ __($name . '.table.category') }}</th>
      <th class="text-center">{{ __($name . '.table.created_at') }}</th>
      <th class="text-center">{{ __($name . '.table.status') }}</th>
    </tr>
  </thead>
  <tbody>

    @forelse ($resources as $resource)
    <tr class="text-center">
      <td>{{ $resource->id }}</td>
      @permission('delete_' . $name)
      <td class="text-nowrap">{!! delete_btn($resource->id, $name) !!}</td>
      @endif
      <td class="text-left">
        @permission('update_' . $name)
        <a href="{{ route($name . '.edit', $resource->id) }}">{{ $resource->title }}</a>
        @else
        {{ $resource->title }}
        @endif
      </td>
      <td>{{ optional($resource->author)->name }}</td>
      <td>{{ optional($resource->category)->name }}</td>
      <td>{{ $resource->created_at->diffForHumans() }}</td>
      <td>{!! status_label($resource->status) !!}</td>
    </tr>
    @empty
    <tr><td colspan="6">{{ __('messages.no-results') }}</td></tr>
    @endforelse

  </tbody>
</table>

<div class="col-sm-12">
  <div class="text-right">{{ $resources->links() }}</div>
</div>