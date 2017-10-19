<?php

namespace App\Policies;

use App\Http\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersConfigPolicy
{
    use HandlesAuthorization;

    /**
     * The permission name.
     *
     * @var string
     */
    private $name = 'users_config';

    public function before($user, $ability)
    {
        if ($user->hasRole('superadmin') || $user->hasPermission('module_' . $this->name)) {
            return true;
        }
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

        return abort(403, 'Access denied message.');
    }
}
