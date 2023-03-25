<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string|max:255',
            'email' => 'email|unique:users,email,' . $this->route('id'),
            'password' => 'string|min:8|max:255',
        ];
    }
}
