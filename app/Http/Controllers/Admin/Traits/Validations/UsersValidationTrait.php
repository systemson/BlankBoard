<?php

namespace App\Http\Controllers\Admin\Traits\Validations;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;

trait UserValidationTrait
{
    /**
     * Return validations for storing current resource.
     *
     * @return array
     */
    protected function storeValidations()
    {
        return [
            'username' => 'required|unique:users|max:18|alpha_num',
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:100',
            'status' => 'required|integer',
            'roles' => 'nullable|array',
        ];
    }

    /**
     * Return validations for updating current resource.
     *
     * @return array
     */
    protected function updateValidations()
    {
        switch (Input::get('form')) {

            case 'user-basic':
                $rules = [
                    'name' => 'required|max:50',
                    'last_name' => 'nullable|max:50',
                    'description' => 'nullable|max:1200',
                ];
                break;
            case 'user-update':
                $rules = [
                    'username' => 'required|max:18|alpha_num',
                    'name' => 'required|max:50',
                    'last_name' => 'nullable|max:50',
                    'email' => 'required|email|max:100',
                    'status' => 'required|integer',
                    'description' => 'nullable|max:1200',
                    'roles' => 'nullable|array',
                ];
                break;
            case 'password-update':
                $rules = [
                    'old_password' => 'required|alpha_dash|max:18',
                    'password' => 'required|alpha_dash|confirmed|different:old_password|max:18',
                    'password_confirmation' => 'required|alpha_dash|max:18',
                ];
                break;
            case 'avatar-update':
                $rules = [
                    'avatar' => 'required|image|max:1024',
                ];
                break;
            default:
                $rules = [];
         }
        return $rules;
    }
}
