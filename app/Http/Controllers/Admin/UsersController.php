<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\User as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ResourceController;
use DB;

class UsersController extends ResourceController
{

    /**
     * The controller resource route name.
     *
     * @var string
     */
    protected $route = 'users';

    /**
     * Model class.
     *
     * @var class
     */
    protected $model = Model::class;

    /**
     * Amount of resources to get from the model.
     *
     * @var int
     */
    protected $paginate = 15;

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        /** Check if logged user is authorized to create resources */
        $this->authorize('create', Model::class);

        /** Create a new resource */
        $resource = Model::create([
            'user' => Input::get('user'),
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'status' => Input::get('status'),
            'description' => Input::get('description'),
            'password' => Input::get('password') ? bcrypt(Input::get('password')) : bcrypt('secret'),
        ]);

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
        $this->authorize('view', $this->model);

        /** Get the specified resource */
        $resource = $this->model::findOrFail($id);

        /** Displays the specified resource page */
        return view('admin.' . $this->route . '.show')
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

        DB::transaction(function () use ($id) {

            /** Get the specified resource */
            $resource = $this->model::findOrFail($id);

            /** Update the specified resource */
            $resource->update(Input::all());

            /** Check if permissions are being set */
            if((Input::get('roles') != null)) {

                /** Syncronize both tables through pivot tale */
                $resource->roles()->sync(Input::get('roles'));
            }

        }, 5);

        /** Redirect back */
        return back();
    }

    /**
     * Update the specified resource password.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword($id)
    {

        /** Check if logged user is authorized to update resources */
        $this->authorize('update', $this->model);

        /** Get the specified resource */
        $resource = $this->model::findOrFail($id);

        /** Validate user's password */
        if (Hash::check(Input::post('od_password'), $resource->password)) {

            /** Update user's password */
            $resource->update(Input::post('password'));
        }

        /** Redirect back */
        return back();
    }
}
