<?php

namespace App\Policies\Traits;

trait BeforePolicyTraits
{

    public function before($user, $ability)
    {
        if ($user->isSuperAdmin()) {

            return true;
        }
    }
}
