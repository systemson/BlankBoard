<?php

namespace App\Http\Controllers\Admin\Traits\Validations;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;

trait CategoriesValidationTrait
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
            'slug' => 'required|unique|max:32',
            'description' => 'nullable|max:120',
            'status' => 'integer',
        ];
    }

    /**
     * Return validations for updating current resource.
     *
     * @return array
     */
    protected function updateValidations()
    {
        $id = Input::get('id');
        return [
            'name' => 'required|max:32',
            'slug' => ['required',Rule::unique('categories')->ignore($id),'max:32'],
            'description' => 'nullable|max:120',
            'status' => 'integer',
        ];
    }
}
