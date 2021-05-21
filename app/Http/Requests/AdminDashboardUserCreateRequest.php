<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminDashboardUserCreateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|string|min:3|max:255',
            'phone'     => 'required|string|min:10|max:30|unique:users',
            'email'     => 'required|string|email|min:7|max:255|unique:users',
            'password'  => 'required|string|min:6',
            'is_admin'  => 'boolean|min:1',
        ];
    }
}
