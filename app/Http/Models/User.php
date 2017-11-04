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
     * Display user image.
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
     * @param string|integer $slug the slug or id of the role
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
     * @todo  first or create permissions within this method
     *
     * @param string|array $slugs the slug of the permission or the module
     * @param boolean $anyInModule check for any permission for the module
     * @return boolean
     */
    public function hasPermission($slugs, $anyInModule = false)
    {
        /** Check if user is superuser */
        if($this->hasRole(config('user.superuser'))) {

            return true;

        /** Check if user is inactive */
        } elseif($this->isActive() == false) {

            return false;
        }

        /** Transform string into array */
        if(is_string($slugs)) {

            $slugs = explode('|', $slugs);
        }

        foreach($this->roles as $role) {

            if($anyInModule) {

                $permissions = Role::find($role->id)->permissions->pluck('module')->unique();

            } else {

                $permissions = Role::find($role->id)->permissions->pluck('slug');
            }

            if(!empty($permissions->intersect($slugs)->all())) {

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
        if($this->status > 0 || $this->hasRole(config('user.superuser'))) {

            return true;
        }

        return false;
    }
}
