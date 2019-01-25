<?php

namespace App\Http\Controllers\Admin\Traits;

use Illuminate\Database\Eloquent\Relations\Relation;

trait PivotTrait
{
    /**
     * Update the pivot column.
     *
     * @param  Relation $relation
     * @param  array $columns the columns to update in the pivot table.
     * @param  int $user_id the user id.
     * @return \Illuminate\Http\Response
     */
    public function updatePivotColumn(Relation $relation, array $column, $user_id = null)
    {
        $user_id = $user_id ?? auth()->id();

        $relation->updateExistingPivot($user_id, $column, false);;
    }

    /**
     * Get pivot column value.
     *
     * @param  Relation $relation
     * @param  string $columns The column to get from the pivot table.
     * @param  int $user_id The user id.
     * @return \Illuminate\Http\Response
     */
    public function getPivotColumn(Relation $relation, $column, $user_id = null)
    {
        $user_id = $user_id ?? auth()->id();

        if($relation->wherePivot('user_id', auth()->id())->first() != null) {
            return $relation->wherePivot('user_id', auth()->id())
            ->first()
            ->pivot
            ->$column;
        }

        return null;
    }
}