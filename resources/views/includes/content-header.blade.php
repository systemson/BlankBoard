<section class="content-header">
  <h1>
    {{ __($name . '.title') }}
  </h1>
  {!! breadcrumb($name, $after ?? [], $before) !!}
</section>