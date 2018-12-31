<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
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
        switch ($this->input()['form']) {

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
                    'avatar' => 'required|image|max:2048',
                ];
                break;
            default:
                $rules = [];
         }
        return $rules;
    }
}
