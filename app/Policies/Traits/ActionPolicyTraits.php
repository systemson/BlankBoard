<?php

namespace App\Policies\Traits;

use App\Http\Models\User;

trait ActionPolicyTraits
{
    /**
     * Determine whether the user can view index page.
     *
     * @param  \App\Http\Models\User  $user
     * @return mixed
     */
    public function index(User $user, $name, $publicActions = array())
    {
        if ((isset($publicActions) && in_array('view', $publicActions)) || $user->hasPermission(ucfirst($name), true)) {

            return true;
        }

        return abort(403, __('messages.access_denied'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Http\Models\User  $user
     * @return mixed
     */
    public function view(User $user, $name, $publicActions = array())
    {
        if ((isset($publicActions) && in_array('index', $publicActions)) || $user->hasPermission('view_' . $name)) {

            return true;
        }

        return abort(403, __('messages.access_denied'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Http\Models\User  $user
     * @return mixed
     */
    public function create(User $user, $name, $publicActions = array())
    {
        if ((isset($publicActions) && in_array('index', $publicActions)) || $user->hasPermission('create_' . $name)) {

            return true;
        }

        return abort(403, __('messages.access_denied'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Http\Models\User  $user
     * @return mixed
     */
    public function update(User $user, $name, $publicActions = array())
    {
        if ((isset($publicActions) && in_array('index', $publicActions)) || $user->hasPermission('update_' . $name)) {

            return true;
        }

        return abort(403, __('messages.access_denied'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Http\Models\User  $user
     * @return mixed
     */
    public function delete(User $user, $name, $publicActions = array())
    {
        if ((isset($publicActions) && in_array('index', $publicActions)) || $user->hasPermission('delete_' . $name)) {

            return true;
        }

        return abort(403, __('messages.access_denied'));
    }
}