<?php

namespace App\Http\Controllers\Api\User;

use App\Users\Domain\Models\User;
use App\Http\Controllers\Controller;
use App\Users\Responders\ChangeUserRoleResponder;
use App\Users\Domain\Services\ChangeUserRoleService;
use App\Users\Domain\Requests\ChangeUserRoleFormRequest;

class ChangeRoleController extends Controller
{
    public function __construct(ChangeUserRoleResponder $responder, ChangeUserRoleService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(ChangeUserRoleFormRequest $request, User $user)
    {
       // dd('sdf');
        return $this->responder->withResponse(
            $this->services->handle($request->validated(), $user)
        )->respond();
    }
}
