<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Models\Setting;
use Auth;

abstract class ResourceController extends Controller
{

    /**
     * The controller resource route name.
     *
     * @var string
     */
    protected $route;

    /**
     * Model class.
     *
     * @var class
     */
    protected $model;

    /**
     * Amount of resources to load from model.
     *
     * @var int
     */
    protected $paginate;

    /**
     * Show the resource list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** Check if logged user is authorized to the resources list */
        $this->authorize('index', $this->model);

        /** Get the resources from the model */
        $resources = $this->model::paginate($this->paginate);

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
        $this->authorize('create', $this->model);

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
        $this->authorize('create', $this->model);

        /** Create a new resource */
        $resource = $this->model::create(Input::all());

        /** Redirect to newly created user resource page */
        return redirect()->route($this->route . '.show', $resource->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id the specified resource id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /** Check if logged user is authorized to view resources */
        $this->authorize('view', $this->model);

        /** Get the specified resource */
        $resource = $this->model::findOrFail($id);

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
        $this->authorize('update', $this->model);

        /** Get the specified resource */
        $resource = $this->model::findOrFail($id);

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
        $this->authorize('update', $this->model);

        /** Get the specified resource */
        $resource = $this->model::findOrFail($id);

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
        $this->authorize('delete', $this->model);

        /** Get the specified resource */
        $resource = $this->model::findOrFail($id);

        /** Delete the specified resource */
        $resource->delete();

        /** Redirect to controller index */
        return redirect()->route($this->route . '.index');
    }
}
