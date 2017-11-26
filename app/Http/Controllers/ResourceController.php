<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\AuthorizeActionTrait;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

abstract class ResourceController extends Controller
{
    use AuthorizeActionTrait;

    /**
     * The controller resource name.
     *
     * @var string
     */
    protected $name;

    /**
     * Model class.
     *
     * @var string
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
        /** Request instance */
        $this->request = $request;

        /** Store the permissions on DB */
        $this->registerPermissions($this->resourceAbilityMap());
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
        return view('admin.' . $this->name . '.index')
        ->with('resources' , $resources)
        ->with('name', $this->name);
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
        return view('admin.' . $this->name . '.create')
        ->with('name', $this->name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        ->route($this->name . '.edit', $resource->id)
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
        return view('admin.' . $this->name . '.show')
        ->with('resource', $resource)
        ->with('name', $this->name);
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
        return view('admin.' . $this->name . '.edit')
        ->with('resource', $resource)
        ->with('name', $this->name);
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

        if (method_exists($this->model, 'trashed')) {

            $resource = $this->model::withTrashed()->findOrFail($id);

            if($resource->trashed()) {

                $resource->forceDelete();

            } else {

                $resource->delete();

                /** Redirect to controller index */
                return redirect()
                ->route($this->name . '.index')
                ->with('warning', 'resource-trashed');
            }

        } else {
            /** Get the specified resource */
            $resource = $this->model::findOrFail($id);

            $resource->delete();
        }

        /** Redirect to controller index */
        return redirect()
        ->route($this->name . '.index')
        ->with('danger', 'resource-deleted');
    }

    /**
     * Restore the specified resource.
     *
     * @param  int $id the specified resource id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        /** Check if logged in user is authorized to make this request */
        $this->authorizeAction();

        /** Get the specified resource */
        $resource = $this->model::withTrashed()->findOrFail($id);

        /** Delete the specified resource */
        $resource->restore();

        /** Redirect to controller index */
        return redirect()
        ->route($this->name . '.index')
        ->with('info', 'resource-restored');
    }

    /**
     * Get the map of resource methods to ability names.
     *
     * @return array
     */
    protected function resourceAbilityMap()
    {
        return [
            //
        ];
    }
}
