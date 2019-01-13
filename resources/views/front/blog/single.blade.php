@extends('layouts.app')

@section('scripts')
<style type="text/css">
#main-content-header,
#main-menu {
  background-color: #df003a;
  color: white;
}
#main-content-header h1 {
  font-family: "Poppins", sans-serif;
  font-weight: bold;
}
#main-content-header p {
  font-family: "Poppins", sans-serif;
}
#main-content {
  font-family:  "Poppins", sans-serif;
}
  
</style>
@endsection

@section('content')
<div id="main-content-header" class="row fullscreen d-flex align-items-center justify-content-center" style="height: 480px;">
  <div class="container text-center">
    <div class="col-sm-8 offset-sm-2">
      <h1>{{ $article->title }}</h1>
      <p class="d-none d-md-block">{!! $article->description !!}</p>
    </div>
  </div>
</div>

<section id="main-content" class="col-sm-12 pb-5">
  <div class="container">
    <div class="col-sm-12 pt-5">
      <div class="text-justify">{!! $article->content !!}</div>
    </div>
  </div>
</section>

@endsection
