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
        'user', 'name', 'last_name', 'email', 'status', 'description',
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
        'created_at',
        'updated_at',
        'deleted_at'
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

    public function hasRole($slug)
    {

        if(is_string($slug)) {

            return $this->roles->contains('slug', $slug);
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

            $permissions = Role::find($role->id)->permissions->where('status', 1)->pluck('slug')->all();

            if(is_array($permissions) && array_intersect($permissions, $names)) {

               return true;
            }
        }

        return false;
    }
}
