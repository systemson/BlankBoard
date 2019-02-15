<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Builder;

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

    public static function resources($selectables, $filters = [], $sortables = [])
    {
        $query = self::select($selectables)
        ->where($filters);

        foreach ($sortables as $column => $order) {
            $query->orderBy($column, $order);
        }

        return $query;
    }

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function newEloquentBuilder($query)
    {
        return new Builder($query);
    }
}
