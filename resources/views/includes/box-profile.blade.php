<div class="box box-primary">
  <div class="box-body box-profile">
    <img class="profile-user-img img-responsive img-circle" src="{{ URL::asset($resource->image()) }}">
    <h3 class="profile-username text-center">{{ $resource->name }}</h3>
    <p class="text-muted text-center">
      {{ $resource->roles->implode('name', ', ') }}.
    </p>
  </div>
</div>

<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">{{ __('auth.description') }}</h3>
  </div>
  <div class="box-body">
    <p>{{ $resource->description }}</p>
  </div>
</div>
