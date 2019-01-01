<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class Home extends Controller
{
	public function index()
	{
		return view('front.home');
	}
}
