<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Permission as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class PermissionsController extends Controller
{

    /**
     * The controller resource route name.
     *
     * @var string
     */
    private $route = 'permissions';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /** Check if logged user is authorized to create resources */
        $this->authorize('view', Model::class);

        /** Get all resources from the model */
        $resources = Model::paginate(10);

        /** Display a listing of the resources */
        return view('admin.' . $this->route . '.index')
        ->with('resources' , $resources)
        ->with('name', $this->route);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        /** Check if logged user is authorized to create resources */
        $this->authorize('create', Model::class);

        /** Show the form for creating a new resource. */
        return view('admin.' . $this->route . '.create')
        ->with('name', $this->route);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        /** Check if logged user is authorized to create resources */
        $this->authorize('store', Model::class);

        /** Create a new resource */
        $resource->create(Input::all());

        /** Redirect to newly created user resource page */
        return redirect()->route($this->route . '.show', $resource->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id current resource id.
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        /** Check if logged user is authorized to view resources */
        $this->authorize('view', Model::class);

        /** Get the specified resource */
        $resource = Model::findOrFail($id);

        /** Displays the specified resource page */
        return view('admin.' . $this->route . '.show')
        ->with('resource', $resource)
        ->with('name', $this->route);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id the specified resource id.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        /** Check if logged user is authorized to update resources */
        $this->authorize('update', Model::class);

        /** Get the specified resource */
        $resource = Model::findOrFail($id);

        /** Displays the edit resource page */
        return view('admin.' . $this->route . '.edit')
        ->with('resource', $resource)
        ->with('name', $this->route);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id the specified resource id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id the specified resource id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        /** Check if logged user is authorized to delete resources */
        $this->authorize('delete', Model::class);

        /** Get the specified resource */
        $resource = Model::findOrFail($id);

        /** Delete the specified resource */
        $resource->delete();

        /** Redirect to controller index */
        return redirect()->route($this->route . '.index');
    }
}
