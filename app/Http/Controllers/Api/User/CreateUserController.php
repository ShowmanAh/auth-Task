<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Users\Responders\CreateUserResponder;
use App\Users\Domain\Services\CreateUserService;
use App\Users\Domain\Requests\CreateUserFormRequest;

class CreateUserController extends Controller
{
    public function __construct(CreateUserResponder $responder, CreateUserService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(CreateUserFormRequest $request)
    {
        return $this->responder->withResponse(
            $this->services->handle($request->validated())
        )->respond();
    }
}
