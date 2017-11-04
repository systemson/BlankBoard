<?php

namespace App\Policies\Traits;

trait BeforePolicyTraits
{

    public function before($user, $ability)
    {

        if ($user->hasRole(config('user.superuser')) || $user->hasPermission('module_' . $this->name)) {

            return true;
        }
    }
}
