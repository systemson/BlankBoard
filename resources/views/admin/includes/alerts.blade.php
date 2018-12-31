@if (session('success'))
  <div class="alert alert-success alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">
      <i class="fa fa-close"></i>
    </a>
    <p><strong>{{ __(session('success')) }}</strong>
      @if (Lang::has(session('success') . '-small'))
        {{ __(session('success') . '-small') }}
      @endif
    </p>
  </div>
@elseif (session('info'))
  <div class="alert alert-info alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">
      <i class="fa fa-close"></i>
    </a>
    <p><strong>{{ __(session('info')) }}</strong>
      @if (Lang::has(session('info') . '-small'))
        {{ __(session('info') . '-small') }}
      @endif
    </p>
  </div>
@elseif (session('warning'))
  <div class="alert alert-warning alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">
      <i class="fa fa-close"></i>
    </a>
    <h3>{{ __(session('warning')) }}</h3>
    @if (Lang::has(session('warning') . '-small'))
      <p>{{ __(session('warning') . '-small') }}</p>
    @endif
  </div>
@elseif (session('danger'))
  <div class="alert alert-danger alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">
      <i class="fa fa-close"></i>
    </a>
    <h3>{{ __(session('danger')) }}</h3>
    @if (Lang::has(session('danger') . '-small'))
      <p>{{ __(session('danger') . '-small') }}</p>
    @endif
  </div>
@elseif (isset($errors) && $errors->any())
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
