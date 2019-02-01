<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Policies\Traits\BeforePolicyTraits;
use App\Policies\Traits\ActionPolicyTraits;
use App\Models\User;
use App\Models\Email;

class EmailPolicy
{
    use HandlesAuthorization,
        BeforePolicyTraits,
        ActionPolicyTraits;


    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function view(User $user, Email $email)
    {
        if ($user->id == $email->user_id || $email->recipients->where('id', $user->id)->isNotEmpty()) {
            return true;
        }

        return abort(403, __('messages.access-denied'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function update(User $user, Email $email)
    {
        if ($user->id == $email->user_id && $email->status == 0) {
            return true;
        }

        return abort(404);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function delete(User $user, Email $email)
    {
        return true;
        if ($user->id == $email->user_id || $email->recipients->where('id', $user->id)->isNotEmpty()) {
            return true;
        }

        return abort(403, __('messages.access-denied'));
    }
}
