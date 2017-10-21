<?php

namespace App\Http\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Models\Role;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user', 'name', 'last_name', 'email', 'description',
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
     * Get roles with a certain user.
     *
     * @return void
     */
    public function roles()
    {

        return $this->belongsToMany(Role::class)->where('status', 1);
    }

    public function hasRole($role)
    {
        if(is_string($role)) {

            return $this->roles->contains('name', ucfirst(strtolower($role)));
        }

        return false;
    }

    public function hasPermission($names)
    {

        if($this->hasRole('superadmin')) {

            return true;
        }

        if(is_string($names)) {

            $names = array($names);
        }

        foreach($this->roles as $role) {

            $permissions = Role::find($role->id)->permissions;

            if(array_intersect($permissions, $names)) {

               return true;
            }
        }

        return false;
    }
}
