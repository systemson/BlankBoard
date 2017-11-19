<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Database\Eloquent\Relations\Relation;

trait PermissionValidationTrait
{
    /**
     * Return validations for updating current resource.
     *
     * @return array
     */
    protected function updateValidations() {
        return [
            'module' => 'required|max:32',
            'description' => 'nullable|max:120',
        ];
    }
}