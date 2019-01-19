<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ResourceModel as Model;

class Category extends Model
{
    //use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'status', 'created_by', 'updated_by',
    ];

    /**
     * The attributes that must be listed for the index page.
     *
     * @var array
     */
    protected static $listable = [
        'id', 'name', 'slug', 'status',
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value);
    }
}
