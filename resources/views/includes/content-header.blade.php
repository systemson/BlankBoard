<section class="content-header">
  <h1>
    {{ __($name . '.title') }}
  </h1>
  <ol class="breadcrumb">

    @if (isset($before) && $before != null)
      @foreach ($before as $item)
        <li>
          @if (isset($item['route']))
            <a href="{{ route($item['route']) }}">
          @else
            <a href="{{ route($name . '.index') }}">
          @endif
            {{ $item['name'] ?? $item }}
          </a>
        </li>
      @endforeach
    @endif

    <li><a href="{{ route($name . '.index') }}">{{ __($name . '.title') }}</a></li>

    @if (isset($after) && $after != null)
      @foreach ($after as $item)
        <li class="active">{{ $item }}</li>
      @endforeach
    @else
        <li class="active">{{ __('messages.here') }}</li>
    @endif

  </ol>
</section>