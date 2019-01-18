<?php

namespace App\Models;

use App\Models\ResourceModel as Model;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
    ];

    /**
     * The attributes that must be listed for the index page.
     *
     * @var array
     */
    protected static $listable = [
        'id', 'name', 'value',
    ];
}
