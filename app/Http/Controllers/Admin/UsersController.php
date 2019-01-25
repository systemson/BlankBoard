<?php

namespace App\Http\Controllers\Admin;

use App\Models\User as Model;
use App\Models\Permission;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Http\Controllers\ResourceController as Controller;
use DB;
use Carbon\Carbon;
use App\Http\Controllers\Admin\Traits\Validations\UserValidationTrait;

class UsersController extends Controller
{
    use UserValidationTrait;

    /**
     * Model class.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * The attributes that must be listed for the index page.
     *
     * @var array
     */
    protected $listable = [
        'id', 'name', 'email', 'status',
    ];

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        /* Check if logged user is authorized to create resources */
        $this->authorize('create', [$this->model]);

        $this->request->validate($this->storeValidations());

        DB::transaction(function () {

            /** Create a new resource */
            $resource = Model::create([
                'user' => Input::get('user'),
                'name' => Input::get('name'),
                'email' => Input::get('email'),
                'status' => Input::get('status'),
                'password' => bcrypt(config('user.default_password', 'secret')),
            ]);

            /* Check if permissions are being set */
            if(Input::get('roles') != null) {
                /** Synchronize both tables through pivot table */
                $resource->roles()->sync(Input::get('roles'));
            }

        }, 5);

        /* Redirect to resource index page */
        return redirect()
        ->route($this->name . '.index')
        ->with('success', $this->name . '.resource-created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id current resource id.
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        /* Check if logged user is authorized to view resources */
        $this->authorize('view', [$this->model, $id]);

        /* Get the specified resource */
        $resource = $this->model::findOrFail($id);

        /* Displays the specified resource page */
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
        /* Check if logged user is authorized to update resources */
        $this->authorize('update', [$this->model, $id]);

        /* Get the specified resource */
        $resource = $this->model::findOrFail($id);

        /* Displays the edit resource page */
        return view('admin.' . $this->name . '.edit')
        ->with('resource', $resource)
        ->with('name', $this->name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateUser;
     * @param  int $id the specified resource id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        /* Check if logged user is authorized to update resources */
        $this->authorize('update', [$this->model, $id]);

        $this->request->validate($this->updateValidations());

        /* Get the specified resource */
        $resource = $this->model::findOrFail($id);

        if(Input::get('password')) {
            if ($this->passwordUpdate($resource)) {

                return redirect()
                ->back()->with('info', $this->name . '.password-success');
            }
            return redirect()->back()->with('warning', $this->name . '.password-failed');
        }

        if(Input::file('avatar')) {
            $this->avatarUpdate($request, $resource);

            return redirect()
            ->back()
            ->with('success', $this->name . '.avatar-updated');
        }

        if($this->userUpdate($resource)) {
            /* Redirect back */
            return redirect()
            ->back()
            ->with('success', $this->name . '.resource-updated');
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
        /* Check if logged user is authorized */
        $this->authorize('delete', [$this->model, $id]);

        /* Get the specified resource */
        $resource = $this->model::findOrFail($id);

        /* Delete the specified resource */
        $resource->delete();

        /* Redirect to controller index */
        return redirect()
        ->route($this->name . '.index')
        ->with('danger', $this->name . '.resource-deleted');
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

            /* Update the specified resource */
            $user->update(Input::all());

            /* Check if permissions are being set */
            if(Input::get('roles') != null && auth()->user()->hasPermission('create_users|update_users')) {

                /** Synchronize both tables through pivot table */
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
        /* Validate user's password */
        if (Hash::check(Input::post('old_password'), $user->password) && !Hash::check(Input::post('password'), $user->password)) {
            /* Update user's password */
            if($user->update([
                'password' => bcrypt(Input::get('password')),
                'last_password_change' => Carbon::now(),
            ])) {
                return true;
            };

        }
        return false;
    }

    /**
     * Update the user's avatar.
     *
     * @param App\Http\Requests\UpdateUser;
     * @param App\Http\Models\User $user
     * @return \Illuminate\Http\Response
     */
    protected function avatarUpdate(UpdateUser $request, Model $user)
    {
        if(Storage::disk(config('user.default_disk'))->exists($user->image)) {

            Storage::disk(config('user.default_disk'))->delete($user->image);
        }

        $path = Storage::disk(config('user.default_disk'))->putFile('avatars', $request->file('avatar'));

        $user->update(['image' => $path]);
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
            'view' => 'view',
            'edit' => 'update',
            'update' => 'update',
            'delete' => 'delete',
        ];
    }
}
