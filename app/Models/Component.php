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
        'name', 'content', 'order', 'status',
    ];
}
