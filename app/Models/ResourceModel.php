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
     * The attributes that should be listed for the index page.
     *
     * @var array
     */
    protected static $listable = [
        '*'
    ];

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
