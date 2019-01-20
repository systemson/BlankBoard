<!-- To the right -->
<div class="pull-right hidden-xs">
  {{ version() }} - <i class="fa fa-clock-o"></i> {{ round(microtime(true) - LARAVEL_START, 6) }}
</div>
<!-- Default to the left -->
{!! __('footer.copyright', ['year' => date('Y'), 'link' => '#', 'name' => config('app.name')]) !!}
