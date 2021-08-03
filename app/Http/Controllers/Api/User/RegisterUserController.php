<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Users\Domain\Requests\UserFormRequest;
use App\Users\Responders\RegisterUserResponder;
use App\Users\Domain\Services\RegisterUserService;


class RegisterUserController extends Controller
{
    public function __construct(RegisterUserResponder $responder, RegisterUserService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke(UserFormRequest $request)
    {
      // dd( $this->services->handle($request->except(['password_confirmation'])));
       // dd('sdf');
       // dd($request->all());
        return $this->responder->withResponse(
            $this->services->handle($request->except(['password_confirmation']))
        )->respond();
    }
}
