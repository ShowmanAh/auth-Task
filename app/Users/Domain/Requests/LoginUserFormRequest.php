<?php

namespace App\Users\Domain\Requests;

use App\Http\Requests\APIRequest;

class LoginUserFormRequest extends APIRequest
{
    public function rules()
    {
        return [
            'email' => 'required|exists:users,email',
            'password' => 'required|min:8|max:32|string',
        ];
    }
}
