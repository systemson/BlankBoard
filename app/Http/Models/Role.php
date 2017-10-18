<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];


    /**
     * Get roles with a certain permission.
     *
     * @return void
     */
    public function permissions()
    {

        return $this->belongsToMany('App\Http\Models\Permission');
    }
}