@extends('layouts.admin')

@section('title', config('app.name', 'Laravel') . ' - ' . __($name . '.title'))

@section('content')
<!-- Content header (Page header) -->
  @include('includes.content-header', ['name' => $name, 'before' => [['name' => 'Admin', 'route' => 'admin'], __($name . '.parent')]])
<!-- /. content header -->

<!-- Main content -->
<section class="content container-fluid">

  <div class="row">

    <div class="col-sm-12">
      @include('includes.alerts')
    </div>

    <div class="col-sm-3">
      @include('includes.box-email')
    </div>

    <div class="col-sm-9">
      <div class="box box-primary">

        <div class="box-header with-border">
          <h3 class="box-title">{{ __($name . '.list', ['title' => __($name . '.title')]) }}</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" type="button" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div><!-- Box header -->

        <div class="box-body no-padding">
          <div class="mailbox-messages">
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
          </div>
          <div class="col-sm-12">
            <div class="text-right">{{ $resources->links() }}</div>
          </div>
        </div>

      </div><!-- /. box -->

    </div><!-- /. col -->
  </div><!-- /. row -->

</section><!-- /.content -->
@stop
