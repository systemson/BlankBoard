<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    /**
     * Create permissions if don't exist.
     *
     * @param   string $module the module related to the permission.
     * @param   array $permissions the permission to register.
     * @return  void
     */
    public function register($module, array $permissions = [])
    {
        if(!empty($permissions)) {

            foreach($permissions as $ability) {

                /** Create permission if don't exist */
                self::firstOrCreate(['slug' => strtolower($ability . '_' . $module)],
                    [
                        'name' => ucwords($ability . ' ' . $module),
                        'module' => studly_case($module),
                    ]);
            }
        }
    }
}
