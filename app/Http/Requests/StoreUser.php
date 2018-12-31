<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'username' => 'required|unique:users|max:18|alpha_num',
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:100',
            'status' => 'required|integer',
            'roles' => 'nullable|array',
        ];
    }
}
