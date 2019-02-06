<?php

namespace App\Models;

use App\Models\ResourceModel as Model;
use App\Models\Setting;

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
     * The attributes that should be listed for the index page.
     *
     * @var array
     */
    protected static $listable = [];

    public function settings()
    {
        return $this->hasMany(Setting::class, 'section', 'slug');
    }

    public function getCanCreateAttribute($value)
    {
        return (bool) $value;
    }

    public function getCanUpdateAttribute($value)
    {
        return (bool) $value;
    }

    public function getCanDeleteAttribute($value)
    {
        return (bool) $value;
    }

    public static function getListable(): array
    {
        return static::$listable;
    }

    public static function setListable(array $listable)
    {
        static::$listable = $listable;
        return self::class;
    }
}
