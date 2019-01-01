<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\ResourceController as Controller;
use App\Http\Controllers\Traits\RoleValidationTrait;
use DB;
use Lang;
use Illuminate\Support\Facades\Cache;

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
     * The columns to select for the index table.
     *
     * @var array
     */
    protected $select = [
        'id', 'name', 'slug', 'status',
    ];

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

        $request->validate($this->storeValidations());

        /** Create a new resource */
       $resource = DB::transaction(function () {

            /** Update the specified resource */
            $resource = $this->model::create(Input::all());

            /** Check if permissions are being set */
            if((Input::get('permissions') != null)) {

                /** Syncronize both tables through pivot table */
                $resource->permissions()->sync(Input::get('permissions'));
            }

            return $resource;

        }, 5);

        /** Redirect to newly created resource page */
        return redirect()
        ->route($this->name . '.edit', $resource->id)
        ->with('success', Lang::has($this->name . '.resource-created') ?
            $this->name . '.resource-created' :
            'messages.alert.resource-created'
        );
    }

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

                /** Syncronize both tables through pivot table */
                $resource->permissions()->sync(Input::get('permissions'));
            }

        }, 5);

        /** Clear user permissions cache */
        Cache::forget('user_' . $id . '_permissions');

        /** Redirect back */
        return redirect()->back()
        ->with('info', Lang::has($this->name . '.resource-updated') ?
            $this->name . '.resource-updated' :
            'messages.alert.resource-updated'
        );
    }

    /**
     * Get the map of resource methods to ability names.
     *
     * @return array
     */
    protected function resourceAbilityMap()
    {
        return [
            'show' => 'show',
            'create' => 'create',
            'store' => 'create',
            'edit' => 'update',
            'update' => 'update',
            'destroy' => 'delete',
        ];
    }
}
