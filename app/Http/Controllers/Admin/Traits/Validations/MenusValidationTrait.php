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
            'title' => 'required|max:32',
            'url' => 'required|string|max:120',
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
            'title' => 'required|max:32',
            'url' => 'required|string|max:120',
            'status' => 'required|integer',
        ];
    }
}
