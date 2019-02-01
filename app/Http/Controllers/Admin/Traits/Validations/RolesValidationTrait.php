<?php

namespace App\Http\Controllers\Admin\Traits\Validations;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;

trait RolesValidationTrait
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
            'slug' => 'required|unique:roles|max:32|alpha_dash',
            'description' => 'nullable|max:120',
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
            'slug' =>['required',Rule::unique('roles')->ignore($id),'max:32','alpha_dash'],
            'description' => 'nullable|max:120',
        ];
    }
}
