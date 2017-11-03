<?php

namespace App\Policies\Traits;

use App\Http\Models\User;

trait ActionPolicyTraits
{
    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Http\Models\User  $user
     * @return mixed
     */
    public function view(User $user)
    {

        if ($user->hasPermission('view_' . $this->name)) {

            return true;
        }

        return abort(403, __('messages.acces_denied'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Http\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->hasPermission('create_' . $this->name)) {
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
    public function update(User $user)
    {
        if ($user->hasPermission('update_' . $this->name)) {
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
    public function delete(User $user)
    {
        if ($user->hasPermission('delete_' . $this->name)) {
            return true;
        }

        return abort(403, __('messages.access_denied'));
    }
}