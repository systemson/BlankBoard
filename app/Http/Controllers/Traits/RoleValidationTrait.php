<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Database\Eloquent\Relations\Relation;

trait RoleValidationTrait
{
    /**
     * Return validations for storing current resource.
     *
     * @return array
     */
    protected function storeValidations() {
        return [
            'name' => 'required|max:32',
            'slug' => 'required|max:32|alpha_dash',
            'description' => 'nullable|max:120',
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
            'slug' => 'required|max:32|alpha_dash',
            'description' => 'nullable|max:120',
        ];
    }
}