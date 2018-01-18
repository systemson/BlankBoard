<section class="content-header">
  <h1>
    {{ __($name . '.title') }}
  </h1>
  {!! breadcrumb(['name' => __($name . '.title'), 'route' => $route ?? $name . '.index'], $after ?? [], $before) !!}
</section>