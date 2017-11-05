<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Email as Model;
use App\Http\Models\User;
use App\Http\Controllers\ResourceController as Controller;

class EmailsController extends Controller
{
    /**
     * The controller resource route name.
     *
     * @var string
     */
    protected $route = 'emails';

    /**
     * Model class.
     *
     * @var class
     */
    protected $model = Model::class;

    /**
     * Show the resource list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** Get the resources from the model */
        $resources = User::find(auth()->user()->id)
        ->emails()
        ->latest()
        ->paginate($this->paginate);

        /** Display a listing of the resources */
        return view('admin.' . $this->route . '.index')
        ->with('resources' , $resources)
        ->with('name', $this->route);
    }
}