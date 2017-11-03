<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user' => 'required',
            'name' => 'required',
            'last_name' => 'nullable',
            'email' => 'required|unique:users',
            'status' => 'required',
            'description' => 'nullable',
            'roles' => 'nullable',
        ];
    }
}
