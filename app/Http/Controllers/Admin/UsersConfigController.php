<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\UsersConfig as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class UsersConfigController extends Controller
{

    /**
     * The controller resource route name.
     *
     * @var string
     */
    private $route = 'users_config';

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id the specified resource id.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /** Check if logged user is authorized to create resources */
        $this->authorize('update', Model::class);

        /** Get all resources from the model */
        $resources = Model::get();

        /** Display a listing of the resources */
        return view('admin.' . $this->route . '.index')
        ->with('resources' , $resources)
        ->with('name', $this->route);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id the specified resource id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

        /** Check if logged user is authorized to update resources */
        $this->authorize('update', Model::class);

        /** Get the specified resource */
        $resource = Model::findOrFail($id);

        /** Update the specified resource */
        $resource->update(Input::all());

        /** Redirect back */
        return back();
    }
}
