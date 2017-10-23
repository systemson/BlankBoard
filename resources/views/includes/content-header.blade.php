<section class="content-header">
  <h1>
    {{ __($name . '.title') }}
  </h1>
  <ol class="breadcrumb">

    @if (isset($before) && $before != null)
      @foreach ($before as $item)
        <li class="active">{{ $item }}</li>
      @endforeach
    @endif

    <li><a href="{{ route($name . '.index') }}"><i class="fa fa-dashboard"></i> {{ __($name . '.title') }}</a></li>

    @if (isset($after) && $after != null)
      @foreach ($after as $item)
        <li class="active">{{ $item }}</li>
      @endforeach
    @else
        <li class="active">Here</li>
    @endif

  </ol>
</section>