<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Users\Responders\LoginUserResponder;
use App\Users\Domain\Services\LoginUserService;
use App\Users\Domain\Requests\LoginUserFormRequest;

class LoginUserController extends Controller
{
    public function __construct(LoginUserResponder $responder, LoginUserService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(LoginUserFormRequest $request)
    {
              // dd('sdf');
        return $this->responder->withResponse(
            $this->services->handle($request->validated())
        )->respond();
    }
}
