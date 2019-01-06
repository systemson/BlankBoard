<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Article;

class CategoryController extends Controller
{
	public function index($slug)
	{
		$category_id = Category::select('id')
		->where('slug', $slug)
		->first();

		$articles = Article::where('category_id', $category_id->id)
		->latest()
		->get();

		return view('front.articles.category')
		->with('articles', $articles);
	}
}
