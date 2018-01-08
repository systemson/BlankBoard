<?php

namespace App\Models\Traits;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Cache;

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
     * Cache user roles.
     *
     * @return mixed
     */
    public function cachedRoles()
    {
        return Cache::remember('user_' . $this->id . '_roles', 15, function () {
            return $this->roles;
        });
    }

    /**
     * Get cached permissions with a certain user.
     *
     * @return mixed
     */
    public function cachedPermissions()
    {
        return Cache::remember('user_' . $this->id . '_permissions', 15, function () {
            $permissions = collect([]);
            foreach($this->roles as $role) {
                $permissions = $permissions->merge($role->permissions->toArray());
            }
            return $permissions;
        });
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

            return $this->cachedRoles()->contains('slug', $slug);

        } elseif (is_int($slug)) {

            return $this->cachedRoles()->contains('id', $slug);
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
        /** Check if user is super admin */
        if($this->isSuperAdmin()) {
            return true;

        /** Check if user is inactive */
        } elseif($this->isInactive() || $this->passwordExpired()) {
            return false;
        }

        /** Convert $slugs string into array */
        if(is_string($slugs)) {
            $slugs = explode('|', $slugs);
        }

        if(!$anyInModule) {
            /** Find current permissions slugs */
            return $this->cachedPermissions()->whereIn('slug', $slugs)->isNotEmpty();

        } else {
            /** Find current role permission modules */
            return $this->cachedPermissions()->whereIn('module', $slugs)->isNotEmpty();
        }
    }
}
