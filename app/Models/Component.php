<?php

namespace App\Models;

use App\Models\ResourceModel as Model;

class Component extends Model
{
    protected $id = 'slug';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'content', 'status',
    ];

    /**
     * The attributes that must be listed for the index page.
     *
     * @var array
     */
    protected static $listable = [
        'id', 'name', 'status',
    ];
}
