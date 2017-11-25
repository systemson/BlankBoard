<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\ResourceController as Controller;
use App\Http\Controllers\Traits\RoleValidationTrait;
use DB;

class RolesController extends Controller
{
    use RoleValidationTrait;

    /**
     * The controller resource route name.
     *
     * @var string
     */
    protected $name = 'roles';

    /**
     * Model class.
     *
     * @var string
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
        /** Check if logged in user is authorized to make this request */
        $this->authorizeAction();

        /** Validate the form input */
        $request->validate($this->updateValidations());

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

    /**
     * Get the map of resource methods to ability names.
     *
     * @return array
     */
    protected function resourceAbilityMap()
    {
        return [
            'index' => 'index',
            'create' => 'create',
            'store' => 'create',
            'edit' => 'update',
            'update' => 'update',
            'destroy' => 'delete',
        ];
    }
}
