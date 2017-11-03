<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Models\Role;
use App\Http\Models\Permission;
use App\User as BaseUserModel;

class User extends BaseUserModel
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user', 'name', 'password', 'last_name', 'email', 'status', 'description',
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
     * The super user role.
     *
     * @var string
     */
    protected $superuser = 'superadmin';

    /**
     * Display user image.
     *
     * @return string
     */
    public function image()
    {
        if(isset($this->image) && $this->image != null) {

            return $this->image;
        } else {
            return 'img/avatar/default.png';
        }
    }

    /**
     * Get roles with a certain user.
     *
     * @return mixed
     */
    public function roles()
    {

        return $this->belongsToMany(Role::class)->where('status', 1);
    }

    /**
     * Check if user has the specified role
     *
     * @param string|integer $slug
     * @return boolean
     */
    public function hasRole($slug)
    {

        if(is_string($slug)) {

            return $this->roles->contains('slug', $slug);

        } elseif (is_int($slug)) {

            return $this->roles->contains('id', $slug);
        }

        return false;
    }

    /**
     * Check if user has the specified permission
     *
     * @param string|array $name
     * @return boolean
     */
    public function hasPermission($names)
    {

        if($this->hasRole($this->superuser)) {

            return true;

        } elseif($this->isActive() == false) {

            return false;
        }

        if(is_string($names)) {

            $names = explode('.', $names);
        }

        foreach($this->roles as $role) {

            $permissions = Role::find($role->id)->permissions->pluck('slug');

            if(!empty($permissions->intersect($names)->all())) {

               return true;
            }
        }

        return false;
    }

    /**
     * Check if the user is active.
     *
     * @return boolean
     */
    public function isActive()
    {

        if($this->status > 0 || $this->hasRole($this->superuser)) {

            return true;
        }
        return false;
    }
}
