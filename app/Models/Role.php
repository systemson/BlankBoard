<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use App\Models\User;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'status', 'description',
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
            foreach ($model->users as $user) {
                $user()->clearCache();
            }
        });
    }

    /**
     * Get permission with a certain roles.
     *
     * @return void
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->where('status', 1);
    }

    /**
     * Get users with a certain roles.
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->where('status', 1);
    }
}
