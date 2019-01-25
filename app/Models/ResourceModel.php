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

    public static function resources($selectables, $filters = [], $sortables = [])
    {
        $query = self::select($selectables)
        ->where($filters);

        foreach ($sortables as $column => $order) {
        	$query->orderBy($column, $order);
        }

        return $query;
    }
}
