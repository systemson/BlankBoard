<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Models\Traits\UserEmailsTrait;
use App\Http\Models\Traits\RolesPermissionTrait;
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
        'user', 'name', 'password', 'last_name', 'email', 'image', 'status', 'description',
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
        'created_at', 'updated_at', 'deleted_at',
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
