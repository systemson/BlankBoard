<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Database\Eloquent\Relations\Relation;

trait CategoriesValidationTrait
{
    /**
     * Return validations for storing current resource.
     *
     * @return array
     */
    protected function storeValidations() {
        return [
            'name' => 'required|max:32',
            'description' => 'nullable|max:120',
            'status' => 'integer',
        ];
    }

    /**
     * Return validations for updating current resource.
     *
     * @return array
     */
    protected function updateValidations() {
        return [
            'name' => 'required|max:32',
            'description' => 'nullable|max:120',
            'status' => 'integer',
        ];
    }
}