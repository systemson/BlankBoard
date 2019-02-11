<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Lang;
use App\Models\Module;

trait ResourceActionsTrait
{
    /**
     * Show the resource list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Check if logged in user is authorized to make this request */
        $this->authorizeAction();

        /* Get the resources from the model */
        $resources = $this->resourcesList($this->model);

        /* Sets the view */
        if (view()->exists("admin.{$this->name}.index")) {
            $view = "admin.{$this->name}.index";
        } else {
            $view = 'admin.includes.actions.index';
        }

        /* Display a listing of the resources */
        return view($view)
        ->with('resources', $resources)
        ->with('module', $this->module);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Check if logged in user is authorized to make this request */
        $this->authorizeAction();

        /* Sets the view */
        if (view()->exists("admin.{$this->name}.create")) {
            $view = "admin.{$this->name}.create";
        } else {
            $view = 'admin.includes.actions.create';
        }

        /* Show the form for creating a new resource. */
        return view($view)
        ->with('name', $this->name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        /* Check if logged in user is authorized to make this request */
        $this->authorizeAction();

        if (method_exists($this, 'storeValidations')) {
            $this->request->validate($this->storeValidations());
        }

        /* Create a new resource */
        $resource = $this->model::create(Input::all());

        /* Redirect to newly created resource page */
        return redirect()
        ->route($this->name . '.edit', $resource->id)
        ->with(
            'success',
            Lang::has($this->name . '.resource-created') ?
            $this->name . '.resource-created' :
            'messages.alert.resource-created'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id the specified resource id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* Check if logged in user is authorized to make this request */
        $this->authorizeAction();

        /* Get the specified resource */
        $resource = $this->model::findOrFail($id);

        /* Sets the view */
        if (view()->exists("admin.{$this->name}.show")) {
            $view = "admin.{$this->name}.show";
        } else {
            $view = 'admin.includes.actions.show';
        }

        /* Displays the specified resource page */
        return view($view)
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
        /* Check if logged in user is authorized to make this request */
        $this->authorizeAction();

        /* Get the specified resource */
        $resource = $this->model::findOrFail($id);

        /* Sets the view */
        if (view()->exists("admin.{$this->name}.edit")) {
            $view = "admin.{$this->name}.edit";
        } else {
            $view = 'admin.includes.actions.edit';
        }

        /* Displays the edit resource page */
        return view($view)
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
    public function update($id)
    {
        /* Check if logged in user is authorized to make this request */
        $this->authorizeAction();

        if (method_exists($this, 'updateValidations')) {
            $this->request->validate($this->updateValidations());
        }

        /* Get the specified resource */
        $resource = $this->model::findOrFail($id);

        /* Update the specified resource */
        $resource->update(Input::all());

        /* Redirect back */
        return redirect()->back()
        ->with(
            'info',
            Lang::has($this->name . '.resource-updated') ?
            $this->name . '.resource-updated' :
            'messages.alert.resource-updated'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id the specified resource id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* Check if logged in user is authorized to make this request */
        $this->authorizeAction();

        if (method_exists($this->model, 'trashed')) {
            $resource = $this->model::withTrashed()->findOrFail($id);

            if ($resource->trashed()) {
                $resource->forceDelete();
            } else {
                $resource->delete();

                /** Redirect to controller index */
                return redirect()
                ->route($this->name . '.index')
                ->with(
                    'warning',
                    Lang::has($this->name . '.resource-trashed') ?
                    $this->name . '.resource-trashed' :
                    'messages.alert.resource-trashed'
                );
            }
        } else {
            /* Get the specified resource */
            $resource = $this->model::findOrFail($id);

            $resource->delete();
        }

        /* Redirect to controller index */
        return redirect()
        ->route($this->name . '.index')
        ->with(
            'danger',
            Lang::has($this->name . '.resource-deleted') ?
            $this->name . '.resource-deleted' :
            'messages.alert.resource-deleted'
        );
    }

    /**
     * Restore the specified resource.
     *
     * @param  int $id the specified resource id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        /* Check if logged in user is authorized to make this request */
        $this->authorizeAction();

        /* Get the specified resource */
        $resource = $this->model::withTrashed()->findOrFail($id);

        /* Restore the specified resource */
        $resource->restore();

        /* Redirect to controller index */
        return redirect()
        ->route($this->name . '.index')
        ->with(
            'success',
            Lang::has($this->name . '.resource-restored') ?
            $this->name . '.resource-restored' :
            'messages.alert.resource-restored'
        );
    }

    /**
     * Get the map of resource actions to ability names.
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
