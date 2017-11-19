<?php

namespace App\Models\Traits;

use App\Models\Role;
use App\Models\Permission;

trait RolesPermissionTrait
{
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
     * Check if the user is super admin.
     *
     * @return boolean
     */
    public function isSuperAdmin()
    {
        if($this->hasRole(config('user.superuser'))) {
            return true;
        }

        return false;
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
     * Check if user has the specified permission.
     *
     * @param string|array $slugs the slug of the permission or the module.
     * @param boolean $anyInModule check for any permission for the specified module.
     * @return boolean
     */
    public function hasPermission($slugs, $anyInModule = false)
    {
        /** Check if user is inactive */
        if($this->isSuperAdmin()) {
            return true;

        /** Check if user is inactive */
        } elseif($this->isInactive()) {
            return false;
        }

        /** Convert $slugs string into array */
        if(is_string($slugs)) {
            $slugs = explode('|', $slugs);
        }

        foreach($this->roles as $role) {

            $permissions = $role->permissions;

            if($anyInModule) {
                /** Find current role permission modules */
                $exists = $role->permissions()->whereIn('module', $slugs)->exists();

            } else {
                /** Find current permissions slugs */
                $exists = $role->permissions()->whereIn('slug', $slugs)->exists();
            }

            if($exists) {
               return true;
            }
        }

        return false;
    }

}
