<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Policies\Traits\BeforePolicyTraits;

class UserPolicy
{
    use HandlesAuthorization,
        BeforePolicyTraits;

    /**
     * The permission name.
     *
     * @var string
     */
    private $name = 'users';

    /**
     * Determine whether the user can view the models list.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function index(User $user)
    {
        if ($user->hasPermission(ucfirst($this->name), true)) {
            return true;
        }

        return abort(403, __('messages.access_denied'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  int $id the resource id.
     * @return mixed
     */
    public function view(User $user, $id)
    {
        if ($user->id == $id || $user->hasPermission('update_' . $this->name)) {
            return true;
        }

        return abort(403, __('messages.access_denied'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
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
     * @param  \App\Models\User  $user
     * @param  int $id the authorized user id.
     * @return mixed
     */
    public function update(User $user, $id)
    {
        if ($user->id == $id || $user->hasPermission('update_' . $this->name)) {
            return true;
        }

        return abort(403, __('messages.access_denied'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  int $id the authorized user id.
     * @return mixed
     */
    public function delete(User $user, $id)
    {
        if ($user->id != $id || ($user->hasPermission('delete_' . $this->name))) {
            return true;
        }

        return abort(403, __('messages.access_denied'));
    }
}
