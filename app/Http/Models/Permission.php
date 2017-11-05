<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'name', 'module', 'status', 'description',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at',
    ];

    protected static $actionMap = [
        'view', 'create', 'update', 'delete',
    ];

    /**
     * Create permissions if don't exist.
     *
     * @param   array $permissions the permission to register.
     * @param   string $module the module related to the permission.
     * @return  void
     */
    public static function register($publicActions, $module = null)
    {
        /** Exclude the public actions */
        $actions = collect(self::$actionMap)->diff($publicActions);

        foreach($actions as $action) {

            /** Create permission if don't exist */
            self::firstOrCreate(['slug' => strtolower($action . '_' . $module)],
                [
                    'name' => ucwords($action . ' ' . $module),
                    'module' => ucfirst($module),
                ]);
        }
    }
}
