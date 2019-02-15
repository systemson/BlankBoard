<table class="table table-hover table-bordered table-striped table-condensed">
	<thead>
		<tr class="info">
			@if (count($resources) > 0)
			@foreach (array_keys($resources[0]->toArray()) as $column)
			<th class="text-center">{{ $column }}</th>
			@endforeach
			@endif
			<!--<th class="text-center">{{ __('messages.table.action') }}</th>-->
		</tr>
	</thead>
	<tbody>

		@forelse ($resources as $item)
		<tr>
			@foreach ($item->toArray() as $column => $value)
				<td class="text-center">{{ $value }}</td>
			@endforeach
		</tr>
		@empty
		<tr><td colspan="5">{{ __('messages.no-results') }}</td></tr>
		@endforelse

	</tbody>
</table>