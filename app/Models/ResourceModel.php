<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class ResourceModel extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at',
    ];

    /**
     * The attributes that must be listed for the index page.
     *
     * @var array
     */
    protected static $listable = [
        '*'
    ];

    public function getStatusAttribute($value)
    {
        return !is_null($value) ? status_label($value) : null;
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
