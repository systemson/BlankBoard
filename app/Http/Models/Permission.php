<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'module', 'slug', 'status', 'description',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];
}