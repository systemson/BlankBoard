<?php

namespace App\Models;

use App\Models\ResourceModel as Model;

class Menu extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'url', 'status',
    ];
}
