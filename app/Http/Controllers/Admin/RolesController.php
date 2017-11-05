<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Role as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\ResourceController as Controller;
use DB;

class RolesController extends Controller
{
    /**
     * The controller resource route name.
     *
     * @var string
     */
    protected $route = 'roles';

    /**
     * Whether the resource is private.
     *
     * @var boolean
     */
    protected $private = true;
    /**
     * Model class.
     *
     * @var class
     */
    protected $model = Model::class;

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id the specified resource id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /** Check if logged user is authorized to update resources */
        $this->authorize('update', $this->model);

        DB::transaction(function () use ($id) {

            /** Get the specified resource */
            $resource = $this->model::findOrFail($id);

            /** Update the specified resource */
            $resource->update(Input::all());

            /** Check if permissions are being set */
            if((Input::get('permissions') != null)) {

                /** Syncronize both tables through pivot tale */
                $resource->permissions()->sync(Input::get('permissions'));
            }

        }, 5);

        /** Redirect back */
        return redirect()->back()
        ->with('info', 'resource-updated');
    }
}
