<?php

namespace App\Models;

use App\Models\ResourceModel as Model;

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
        return $this->belongsTo(User::class, 'created_by');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setUrlAliasAttribute($value)
    {
        $this->attributes['url_alias'] = str_slug($value);
    }
}
