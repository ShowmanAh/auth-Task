<?php

namespace App\Users\Domain\Requests;

use App\Http\Requests\APIRequest;

class CreateUserFormRequest extends APIRequest
{

    public function rules()
    {
        return [
            'name' => 'required|min:6|max:32|string|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:32|confirmed',

            'slug' => [
                'required',
                'exists:roles,slug',
            ],
        ];
    }
}
