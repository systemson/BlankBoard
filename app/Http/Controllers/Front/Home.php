<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class Home extends Controller
{
	public function index()
	{
		return view('home');
	}

	public function logout()
	{
	    Auth::logout();
        return redirect()->route('home');
	}
}
