<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Models\Permission;
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
     * The actions that should be omitted by the policy.
     *
     * @var array  view|create|update|delete
     */
    protected $publicActions = [
        //'view', 'create', 'update', 'delete',
    ];

    /**
    * Instantiate the controller.
    *
    * @return void
    */
    public function __construct()
    {
        /** Store the permissions on DB */
        Permission::register($this->publicActions, $this->route);
    }

    /**
     * Show the resource list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** Check if logged user is authorized to the resources list */
        $this->authorize('index', [$this->model, $this->route, $this->publicActions]);

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
        $this->authorize('create', [$this->model, $this->route, $this->publicActions]);

        /** Show the form for creating a new resource. */
        return view('admin.' . $this->route . '.create')
        ->with('name', $this->route);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {
        /** Check if logged user is authorized to create resources */
        $this->authorize('create', [$this->model, $this->route, $this->publicActions]);

        /** Create a new resource */
        $resource = $this->model::create(Input::all());

        /** Redirect to newly created user resource page */
        return redirect()
        ->route($this->route . '.edit', $resource->id)
        ->with('success', 'resource-created');
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
        $this->authorize('view', [$this->model, $this->route, $this->publicActions]);

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
        $this->authorize('update', [$this->model, $this->route, $this->publicActions]);

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
    public function update(Request $request, $id)
    {
        /** Check if logged user is authorized to update resources */
        $this->authorize('update', [$this->model, $this->route, $this->publicActions]);

        /** Get the specified resource */
        $resource = $this->model::findOrFail($id);

        /** Update the specified resource */
        $resource->update(Input::all());

        /** Redirect back */
        return redirect()->back()
        ->with('info', 'resource-updated');
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
        $this->authorize('delete', [$this->model, $this->route, $this->publicActions]);

        /** Get the specified resource */
        $resource = $this->model::findOrFail($id);

        /** Delete the specified resource */
        $resource->delete();

        /** Redirect to controller index */
        return redirect()
        ->route($this->route . '.index')
        ->with('warning', 'resource-deleted');
    }
}
