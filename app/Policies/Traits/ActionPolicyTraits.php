<?php

namespace App\Policies\Traits;

use App\Models\User;

trait ActionPolicyTraits
{
    /**
     * Determine whether the user can view index page.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function index(User $user, $name)
    {
        if ($user->hasPermission(ucfirst($name), true)) {
            return true;
        }

        return abort(403, __('messages.access-denied'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  string  $name the name of the resource.
     * @return mixed
     */
    public function view(User $user, $name)
    {
        if ($user->hasPermission('view_' . $name)) {
            return true;
        }

        return abort(403, __('messages.access-denied'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @param  string  $name the name of the resource.
     * @return mixed
     */
    public function create(User $user, $name)
    {
        if ($user->hasPermission('create_' . $name)) {
            return true;
        }

        return abort(403, __('messages.access-denied'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  string  $name the name of the resource.
     * @return mixed
     */
    public function update(User $user, $name)
    {
        if ($user->hasPermission('update_' . $name)) {
            return true;
        }

        return abort(403, __('messages.access-denied'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  string  $name the name of the resource.
     * @return mixed
     */
    public function delete(User $user, $name)
    {
        if ($user->hasPermission('delete_' . $name)) {
            return true;
        }

        return abort(403, __('messages.access-denied'));
    }
}
