<?php

namespace App\Models;

use App\Models\ResourceModel as Model;

class Module extends Model
{
    protected $id = 'slug';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'status', 'can_create', 'can_read', 'can_update', 'can_delete',
    ];

    /**
     * The attributes that must be listed for the index page.
     *
     * @var array
     */
    protected static $listable = [
        'id', 'name', 'slug', 'status',
    ];

    public function getCanCreateAttribute($value)
    {
        return (bool) $value;
    }

    public function getCanDeleteAttribute($value)
    {
        return (bool) $value;
    }
}
