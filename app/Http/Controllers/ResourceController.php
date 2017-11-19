<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Models\Permission;
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
     * Request.
     *
     * @var Illuminate\Http\Request
     */
    protected $request;

    /**
     * The permissions that should be registered.
     *
     * @var array  view|create|update|delete
     */
    protected $permissions = [
        //
    ];

    /**
    * Instantiate the controller.
    *
    * @return void
    */
    public function __construct(Request $request)
    {
        $this->request = $request;

        /** Store the permissions on DB */
        Permission::register($this->route, $this->permissions);
    }

    /**
     * Show the resource list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** Check if logged in user is authorized to make this request */
        $this->authorizeAction();

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
        /** Check if logged in user is authorized to make this request */
        $this->authorizeAction();

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
        /** Check if logged in user is authorized to make this request */
        $this->authorizeAction();

        if(method_exists($this, 'storeValidations')) {
            $request->validate($this->storeValidations());
        }

        /** Create a new resource */
        $resource = $this->model::create(Input::all());

        /** Redirect to newly created resource page */
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
        /** Check if logged in user is authorized to make this request */
        $this->authorizeAction();

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
        /** Check if logged in user is authorized to make this request */
        $this->authorizeAction();

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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /** Check if logged in user is authorized to make this request */
        $this->authorizeAction();

        if(method_exists($this, 'updateValidations')) {
            $request->validate($this->updateValidations());
        }

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
        /** Check if logged in user is authorized to make this request */
        $this->authorizeAction();

        /** Get the specified resource */
        $resource = $this->model::findOrFail($id);

        /** Delete the specified resource */
        $resource->delete();

        /** Redirect to controller index */
        return redirect()
        ->route($this->route . '.index')
        ->with('warning', 'resource-deleted');
    }

    /**
     * Get the map of resource methods to ability names.
     *
     * @return array
     */
    protected function resourceAbilityMap()
    {
        return [
            'index' => 'index',
            'show' => 'view',
            'create' => 'create',
            'store' => 'create',
            'edit' => 'update',
            'update' => 'update',
            'destroy' => 'delete',
            'restore' => 'delete',
        ];
    }

    protected function authorizeAction(array $params = [])
    {
        $params = empty($params) ? [$this->route] : $params;

        $arguments = array_merge([$this->model], $params);

        if($this->getAbility()) {
            $this->authorize($this->getAbility(), $arguments);
        }
    }

    protected function getActionMethod()
    {
        return $this->request->route()->getActionMethod();
    }

    protected function getAbility()
    {
        if(isset($this->resourceAbilityMap()[$this->getActionMethod()])) {
            return $this->resourceAbilityMap()[$this->getActionMethod()];
        }
        return false;

    }
}




