<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Traits\UserEmailsTrait;
use App\Models\Traits\RolesPermissionTrait;
use App\User as BaseUserModel;

class User extends BaseUserModel
{
    use SoftDeletes,
        UserEmailsTrait,
        RolesPermissionTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'password', 'status', 'image', 'description', 'last_login', 'last_password_change',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'last_password_change', 'created_at', 'updated_at', 'deleted_at',
    ];

    /**
     * Display user avatar.
     *
     * @return string
     */
    public function image()
    {
        if(isset($this->image) && $this->image != null) {

            return asset('storage/' . $this->image);
        } else {
            return config('user.default_avatar');
        }
    }

    /**
     * Check if the user is active.
     *
     * @return boolean
     */
    public function isActive()
    {
        if($this->status > 0 || $this->isSuperAdmin()) {

            return true;
        }

        return false;
    }

    /**
     * Check if the user is inactive.
     *
     * @return boolean
     */
    public function isInactive()
    {
        if($this->status <= 0) {

            return true;
        }

        return false;
    }
}
