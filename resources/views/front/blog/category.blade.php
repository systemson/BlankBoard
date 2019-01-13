@extends('layouts.app')

@section('content')
<section id="main-content" class="col-sm-12 py-5">
  <div class="container">
    <div class="row pt-5">
      @foreach ($articles as $article)

      <div class="col-md-6 col-lg-4">
        @if ($article->image)
        <img src="{{ asset('/storage/' . $article->image) }}">
        @endif
        <h3>
          <a href="{{ route('blog.single', ['category' => $article->category->slug, 'slug' =>$article->url_alias]) }}
            ">{{ $article->title }}</a>
        </h3>
        <p>{!! str_limit($article->description ?? $article->content, 126, '... <a href="'. route('blog.single', ['category' => $article->category->slug, 'slug' =>$article->url_alias]) .'">read more</a>') !!}</p>
        <p>{{ $article->created_at->diffForHumans() }}</p>
      </div>

      @endforeach
    </div>
  </div>
</section>
@endsection
