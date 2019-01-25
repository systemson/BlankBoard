<?php

namespace App\Models;

use App\Models\ResourceModel as Model;
use Carbon\Carbon;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'image', 'description', 'url_alias', 'author_alias', 'status', 'category_id', 'content', 'created_by', 'updated_by',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function setUrlAliasAttribute($value)
    {
        $this->attributes['url_alias'] = str_slug($value);
    }
}
