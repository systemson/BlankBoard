@extends('layouts.app')

@section('scripts')
<style type="text/css">
#blog-content {
  font-family:  "Poppins", sans-serif;
  text-align: justify;
}
.blog-item {
  margin-bottom: 32px;
}
.blog-item-img {
  width: 100%;
  height: auto;
  border-radius: 12px;
  margin-bottom: 12px;
}
.blog-item-title,
.blog-item-title a {
  font-weight: 400;
  font-size: 24px;
  color: #333;
}
.blog-item-desc {
  font-weight: 300;
}
.blog-item-time {
  font-weight: 300;
  font-size: 13px;
  font-style: italic;
}
.blog-item-readmore {
  font-weight: 400;
  color: inherit;
  font-style: italic;
  text-decoration: underline;
}
</style>
@endsection

@section('content')
<section id="blog-content" class="col-sm-12 py-5">
  <div class="container">
    <div class="row pt-5">
      @foreach ($articles as $article)

      <div class="blog-item col-md-6 col-lg-4">
        @if ($article->image)
        <img class="blog-item-img" src="{{ asset($article->image) }}">
        @endif
        <h3 class="blog-item-title">
          <a href="{{ route('blog.single', ['category' => $article->category->slug, 'slug' =>$article->url_alias]) }}
            ">{{ $article->title }}</a>
        </h3>
        <p class="blog-item-desc">{!! str_limit($article->description ?? $article->content, 126, '... <a class="blog-item-readmore" href="'. route('blog.single', ['category' => $article->category->slug, 'slug' =>$article->url_alias]) .'">read more</a>') !!}</p>
        <p class="blog-item-time">{{ $article->created_at->diffForHumans() }}</p>
      </div>

      @endforeach
    </div>
  </div>
</section>
@endsection
