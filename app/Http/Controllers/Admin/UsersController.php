<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\User as Model;
use App\Http\Models\Permission;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Controllers\Controller;
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
     * Amount of resources to load from model.
     *
     * @var int
     */
    protected $paginate = 15;

    /**
     * The actions that should be omitted by the policy
     *
     * @var array
     */
    protected $publicActions = [];

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
    public function store(StoreUser $request)
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
            'password' => bcrypt(config('user.default_password')),
        ]);

        /** Redirect to newly created user resource page */
        return redirect()
        ->route($this->route . '.show', $resource->id)
        ->with('success', 'user-created');
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
    public function update(Request $request, $id)
    {
        /** Check if logged user is authorized to update resources */
        $this->authorize('update', [$this->model, $id]);

        /** Get the specified resource */
        $resource = $this->model::findOrFail($id);

        if(Input::get('password')) {
            if ($check = $this->passwordUpdate($resource)) {
                return redirect()->back()->with('info', 'password');
            }
            return redirect()->back()->with('warning', 'password-failed');
        }

        if(Input::file('avatar')) {
            $this->avatarUpdate($request, $resource);
            return redirect()->back()->with('info', 'avatar-updated');
        }

        if($this->userUpdate($resource)) {
            /** Redirect back */
            return redirect()->back()->with('info', 'user-updated');
        }

        return redirect()->back()->with('warning', 'failed');
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
        return redirect()
        ->route($this->route . '.index')
        ->with('warning', 'user-deleted');
    }

    /**
     * Update user in storage.
     *
     * @param App\Http\Models\User $user
     * @return \Illuminate\Http\Response
     */
    protected function userUpdate(Model $user)
    {
        DB::transaction(function () use ($user) {

            /** Update the specified resource */
            $user->update(Input::all());

            /** Check if permissions are being set */
            if((Input::get('roles') != null) && $user->hasPermission(['module_users', 'update_users'])) {

                /** Syncronize both tables through pivot table */
                $user->roles()->sync(Input::get('roles'));
            }

        }, 5);

        return true;
    }

    /**
     * Update user's password.
     *
     * @param App\Http\Models\User $user
     * @return \Illuminate\Http\Response
     */
    protected function passwordUpdate(Model $user)
    {
        /** Validate user's password */
        if (Hash::check(Input::post('old_password'), $user->password) && !Hash::check(Input::post('password'), $user->password)) {

            /** Update user's password */
            $user->update([
                'password' => bcrypt(Input::get('password')),
            ]);
            /** Redirect back */
            return true;
        }
        return false;
    }

    /**
     * Update the user's avatar.
     *
     * @param Illuminate\Http\Request $request
     * @param App\Http\Models\User $user
     * @return \Illuminate\Http\Response
     */
    protected function avatarUpdate(Request $request, Model $user)
    {
        if(Storage::disk(config('user.default_disk'))->exists($user->image)) {

            Storage::disk(config('user.default_disk'))->delete($user->image);
        }

        $path = $request->file('avatar')->store('avatars', config('user.default_disk'));
        $user->update(['image' => $path]);
    }
}
