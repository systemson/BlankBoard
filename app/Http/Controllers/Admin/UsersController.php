<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\User as Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ResourceController as Controller;
use DB;

class UsersController extends Controller
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
     * Show the form for editing the specified resource.
     *
     * @param  int $id the specified resource id.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /** Check if logged user is authorized to create resources */
        $this->authorize('index', $this->model);

        /** Get the resources from the model */
        $resources = $this->model::paginate($this->paginate);

        /** Display a listing of the resources */
        return view('admin.' . $this->route . '.index')
        ->with('resources' , $resources)
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
        $this->authorize('create', [$this->model]);

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
        $this->authorize('view', [$this->model, $id]);

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
        $this->authorize('update', [$this->model, $id]);

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
        $this->authorize('update', [$this->model, $id]);

        DB::transaction(function () use ($id) {

            /** Get the specified resource */
            $resource = $this->model::findOrFail($id);

            /** Update the specified resource */
            $resource->update(Input::all());

            /** Check if permissions are being set */
            if((Input::get('roles') != null)) {

                /** Syncronize both tables through pivot table */
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
    public function password($id)
    {

        /** Check if logged user is authorized to update resources */
        $this->authorize('update', $this->model);

        /** Get the specified resource */
        $resource = $this->model::findOrFail($id);

        /** Validate user's password */
        if (Hash::check(Input::post('old_password'), $resource->password)) {

            /** Update user's password */
            $resource->update([
                'password' => bcrypt(Input::get('password')),
            ]);
        }

        /** Redirect back */
        return back();
    }
}
