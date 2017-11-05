@if (session('success'))
  <div class="alert alert-success alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">
      <i class="fa fa-close"></i>
    </a>
    <p><strong>{{ __('messages.alert.' . session('success')) }}</strong>
      @if (Lang::has('messages.alert.' . session('success') . '-small'))
        {{ __('messages.alert.' . session('success') . '-small') }}
      @endif
    </p>
  </div>
@elseif (session('info'))
  <div class="alert alert-info alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">
      <i class="fa fa-close"></i>
    </a>
    <p><strong>{{ __('messages.alert.' . session('info')) }}</strong>
      @if (Lang::has('messages.alert.' . session('info') . '-small'))
        {{ __('messages.alert.' . session('info') . '-small') }}
      @endif
    </p>
  </div>
@elseif (session('warning'))
  <div class="alert alert-warning alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">
      <i class="fa fa-close"></i>
    </a>
    <h3>{{ __('messages.alert.' . session('warning')) }}</h3>
    @if (Lang::has('messages.alert.' . session('warning') . '-small'))
      <p>{{ __('messages.alert.' . session('warning') . '-small') }}</p>
    @endif
  </div>
@elseif (session('danger'))
  <div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">
      <i class="fa fa-close"></i>
    </a>
    <h3>{{ __('messages.alert.' . session('danger')) }}</h3>
    @if (Lang::has('messages.alert.' . session('danger') . '-small'))
      <p>{{ __('messages.alert.' . session('danger') . '-small') }}</p>
    @endif
  </div>
@elseif ($errors->any())
  <div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">
      <i class="fa fa-close"></i>
    </a>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
