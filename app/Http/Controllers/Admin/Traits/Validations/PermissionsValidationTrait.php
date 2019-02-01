<?php

namespace App\Http\Controllers\Admin\Traits\Validations;

use Illuminate\Database\Eloquent\Relations\Relation;

trait PermissionsValidationTrait
{
    /**
     * Return validations for updating current resource.
     *
     * @return array
     */
    protected function updateValidations()
    {
        return [
            'description' => 'nullable|max:120',
        ];
    }
}
