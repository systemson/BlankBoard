<?php

namespace App\Http\Controllers\Admin\Traits\Validations;

use Illuminate\Database\Eloquent\Relations\Relation;

trait ArticlesValidationTrait
{
    /**
     * Return validations for storing current resource.
     *
     * @return array
     */
    protected function storeValidations()
    {
        return [
            'title' => 'required|max:120',
            'image' => 'nullable',
            'description' => 'nullable|max:250',
            'status' => 'required|integer',
            'category_id' => 'required|integer',
            'content' => 'required',
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
            'title' => 'required|max:120',
            'image' => 'nullable',
            'description' => 'nullable|max:250',
            'status' => 'required|integer',
            'category_id' => 'required|integer',
            'content' => 'required',
        ];
    }
}
