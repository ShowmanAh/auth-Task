<?php

namespace App\Users\Domain\Requests;
use Illuminate\Support\Arr;
use App\Http\Requests\APIRequest;

class ChangeUserRoleFormRequest extends APIRequest
{
    public function rules()
    {
        return [
            'slug' => 'required|string|exists:roles,slug',
        ];
    }
    public function validationData()
    {
        return array_merge(
            $this->request->all(),
            Arr::only($this->route()->parameters(), 'slug')
        );
    }
}
