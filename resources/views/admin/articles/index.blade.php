@extends('layouts.admin')

@section('title', config('app.name', 'Laravel') . ' - ' . __($name . '.title'))

@section('content-header')
<!-- Content header (Page header) -->
  @include('admin.includes.content-header', ['name' => $name, 'before' => [['name' => __('messages.admin-site'), 'route' => 'admin'], __($name . '.parent')]])
<!-- /. content header -->
@stop

@section('content')
<div class="col-sm-12">
  <div class="box box-primary">

    <div class="box-header with-border">
      <h3 class="box-title">@lang($name . '.list', ['title' => __($name . '.title')])</h3>
      <div class="box-tools pull-right">
        @if ($module->can_create)
        @permission('create_' . $name)
        {!! button('new', route($name . '.create')) !!}
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
            <th>@lang($name . '.table.id')</th>
            @permission('delete_' . $name)
            <th class="text-center">@lang($name . '.table.action')</th>
            @endif
            <th class="col-sm-6">@lang($name . '.table.title')</th>
            <th class="text-center">@lang($name . '.table.author')</th>
            <th class="text-center">@lang($name . '.table.category')</th>
            <th class="text-center">@lang($name . '.table.created_at')</th>
            <th class="text-center">@lang($name . '.table.status')</th>
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
          <tr><td colspan="6">@lang('messages.no-results')</td></tr>
          @endforelse

        </tbody>
      </table>

      <div class="col-sm-12">
        <div class="text-right">{{ $resources->links() }}</div>
      </div>

    </div><!-- /. box body -->

  </div><!-- /. box -->

</div><!-- /. col -->
@stop
