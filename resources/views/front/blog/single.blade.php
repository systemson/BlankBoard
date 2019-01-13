@extends('layouts.app')

@section('content')
<div class="row fullscreen d-flex align-items-center justify-content-center bg-success" style="height: 480px;">
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
