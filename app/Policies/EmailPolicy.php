<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Policies\Traits\BeforePolicyTraits;
use App\Policies\Traits\ActionPolicyTraits;

class EmailPolicy
{
    use HandlesAuthorization,
        BeforePolicyTraits,
        ActionPolicyTraits;
}