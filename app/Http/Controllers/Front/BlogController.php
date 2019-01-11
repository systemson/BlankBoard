<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Article;

class BlogController extends Controller
{
	public function category($slug)
	{
		$category = Category::select('id')
		->where('slug', $slug)
		->first();

		$articles = Article::where('category_id', $category->id)
		->latest()
		->get();

		return view('front.blog.category')
		->with('articles', $articles);
	}

	public function single($category, $slug)
	{
		$category = Category::select('id')
		->where('slug', $category)
		->first();

		$article = Article::where('url_alias', $slug)
		->where('category_id', $category->id)
		->latest()
		->firstOrFail();

		return view('front.blog.single')
		->with('article', $article);
	}
}
