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
}
