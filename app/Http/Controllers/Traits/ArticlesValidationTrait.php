<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Database\Eloquent\Relations\Relation;

trait ArticlesValidationTrait
{
    /**
     * Return validations for storing current resource.
     *
     * @return array
     */
    protected function storeValidations() {
        return [
            'title' => 'required|max:50',
            'description' => 'nullable|max:120',
            'status' => 'integer',
            'category_id' => 'required|integer',
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
            'title' => 'required|max:50',
            'description' => 'nullable|max:120',
            'status' => 'integer',
            'category_id' => 'required|integer',
            'content' => 'required',
        ];
    }
}