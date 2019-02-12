<?php

namespace App\Http\Controllers\Admin\Traits\Validations;

use Illuminate\Database\Eloquent\Relations\Relation;

trait MenusValidationTrait
{
    /**
     * Return validations for storing current resource.
     *
     * @return array
     */
    protected function storeValidations()
    {
        return [
            'name' => 'required|max:32',
            'slug' => 'required|max:32',
            'status' => 'required|integer',
        ];
    }

    /**
     * Return validations for updating current resource.
     *
     * @return array
     */
    protected function updateValidations()
    {
        return [
            'name' => 'required|max:32',
            'slug' => 'required|max:32',
            'status' => 'required|integer',
        ];
    }
}
