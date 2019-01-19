<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Component;

class Home extends Controller
{
	public function index()
	{
		$components = Component::where('status', 1)
		->get();

		return view('front.home')
		->with('components', $components);
	}
}
