<?php

namespace App\Http\Controllers\Admin\Traits\Validations;

use Illuminate\Database\Eloquent\Relations\Relation;

trait ComponentsValidationTrait
{
    /**
     * Return validations for storing current resource.
     *
     * @return array
     */
    protected function storeValidations() {
        return [
            'name' => 'required|max:120',
            'description' => 'nullable|max:250',
            'status' => 'required|integer',
            'order' => 'required|integer',
            'content' => 'required',
        ];
    }

    /**
     * Return validations for updating current resource.
     *
     * @return array
     */
    protected function updateValidations() {
        return [
            'name' => 'required|max:120',
            'description' => 'nullable|max:250',
            'status' => 'required|integer',
            'order' => 'required|integer',
            'content' => 'required',
        ];
    }
}