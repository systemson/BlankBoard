<?php

namespace App\Models;

use App\Models\ResourceModel as Model;

class MenuItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'url', 'status', 'order', 'menu_id',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
