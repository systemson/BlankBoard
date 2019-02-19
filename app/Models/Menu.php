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
        'name', 'slug', 'description', 'status',
    ];

    public function items()
    {
        return $this->hasMany(MenuItem::class)
        ->orderBy('order')
        ->orderBy('id');
    }
}
