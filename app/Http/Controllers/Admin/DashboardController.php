<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    /**
     * The controller resource route name.
     *
     * @var string
     */
    private $route = 'dashboard';

    /**
     * Display the dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Display the dashboard. */
        return view('admin.' . $this->route . '.index')
        ->with('name', $this->route);
    }
}
