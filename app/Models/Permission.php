<?php

namespace App\Models;

use App\Models\ResourceModel as Model;
use App\Models\Role;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'module', 'status', 'description',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at',
    ];

    public static function boot()
    {
        parent::boot();

        self::updated(function($model) {
            foreach ($model->roles as $role) {
                foreach ($role->users as $user) {
                    $user->clearCache();
                }

            }
        });
    }

    /**
     * Create permissions if don't exist.
     *
     * @param   string $module the module related to the permission.
     * @param   array $permissions the permission to register.
     * @return  void
     */
    public static function register($module, array $permissions = [])
    {
        if(!empty($permissions)) {
            foreach($permissions as $ability) {

                /* Create permission if don't exist */
                self::firstOrCreate(['slug' => strtolower($ability . '_' . $module)],
                    [
                        'name' => ucwords($ability . ' ' . $module),
                        'module' => studly_case($module),
                    ]);
            }
        }
    }

    /**
     * Get permission with a certain roles.
     *
     * @return void
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->where('status', 1);
    }
}
