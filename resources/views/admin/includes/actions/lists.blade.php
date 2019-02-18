<table class="table table-hover table-bordered table-striped table-condensed">
    @if ($resources->count() > 0)
    	<thead>
        	<tr class="info">
                @foreach (array_keys($resources->first()->toArray()) as $column)
                    {!! th($column) !!}
                @endforeach
            	@if ($module->can_read || $module->can_update || $module->can_delete)
            	    <th class="text-center">{{ __('messages.table.action') }}</th>
            	@endif
	        </tr>
	    </thead>
    @endif
    <tbody>

        @forelse ($resources as $item)
        <tr>
            @foreach ($item->toArray() as $column => $value)
                {!! td($item, $column) !!}
            @endforeach
            <td class="text-nowrap text-center">

                @if ($module->can_read)
                    @permission('view_' . $module->slug)
                        {!! show_btn($item->id, $module->slug) !!}
                    @endif
                @endif

                @if ($module->can_update)
                    @permission('update_' . $module->slug)
                        {!! edit_btn($item->id, $module->slug) !!}
                    @endif
                @endif

                @if ($module->can_delete)
                    @permission('delete_' . $module->slug)
                        {!! delete_btn($item->id, $module->slug) !!}
                    @endif
                @endif

            </td>
        </tr>
        @empty
        <tr><td>{{ __('messages.no-results') }}</td></tr>
        @endforelse

    </tbody>
</table>