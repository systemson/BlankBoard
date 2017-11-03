<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Policies\Traits\BeforePolicyTraits;
use App\Policies\Traits\ActionPolicyTraits;

class RolePolicy
{
    use HandlesAuthorization,
        BeforePolicyTraits,
        ActionPolicyTraits;

    /**
     * The permission name.
     *
     * @var string
     */
    private $name = 'roles';
}
