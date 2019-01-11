@extends('layouts.app')

@section('content')
<div class="row mt-5">
	@foreach ($articles as $article)

	<div class="col-sm-6 col-md-4 col-lg-3 p-5">
		@if ($article->image)
		<img src="{{ asset('/storage/' . $article->image) }}">
		@endif
		<h3><a href="{{ route('blog.single', ['category' => $article->category->slug, 'slug' =>$article->url_alias]) }}
">{{ $article->title }}</a></h3>
		<p>{!! str_limit($article->description ?? $article->content, 126, '... <a href="'. route('blog.single', ['category' => $article->category->slug, 'slug' =>$article->url_alias]) .'">read more</a>') !!}</p>
		<p>{{ $article->created_at->diffForHumans() }}</p>
	</div>

	@endforeach
</div>
@endsection
