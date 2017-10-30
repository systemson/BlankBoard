<?php

namespace App\Policies\Traits;

trait BeforePolicyTraits
{

    public function before($user, $ability)
    {

        if ($user->hasRole('superadmin') || $user->hasPermission('module_' . $this->name)) {

            return true;
        }
    }
}
