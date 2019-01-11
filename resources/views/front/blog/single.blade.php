@extends('layouts.app')

@section('content')

<section id="main-content" class="col-sm-12 pb-5">
  <div class="container">
    <div class="row fullscreen d-flex align-items-center justify-content-center bg-success" style="height: 420px;">
      <div class="col-sm-7 text-center">
        <h1>{{ $article->title }}</h1>
        <p>{!! $article->description !!}</p>
      </div>
    </div>
    <div class="row fullscreen d-flex justify-content-center pt-5">
      <div class="text-justify">{!! $article->content !!}</div>
    </div>
  </div>
</section>
@endsection
