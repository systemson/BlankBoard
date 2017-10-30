<!-- To the right -->
<div class="pull-right hidden-xs">
  {{ __('footer.version') }} - <i class="fa fa-clock-o"></i> {{ round(microtime(true) - LARAVEL_START, 6) }}
</div>
<!-- Default to the left -->
{!! __('footer.copyright', ['year' => '2017', 'link' => '#', 'name' => config('app.name')]) !!}
