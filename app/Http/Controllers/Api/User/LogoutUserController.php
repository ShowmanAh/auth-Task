<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Users\Responders\LogoutUserResponder;
use App\Users\Domain\Services\LogoutUserService;

class LogoutUserController extends Controller
{
    public function __construct(LogoutUserResponder $responder, LogoutUserService $services)
    {
        $this->responder = $responder;
        $this->services = $services;
    }
    public function __invoke()
    {
        return $this->responder->withResponse(
            $this->services->handle()
        )->respond();
    }
}
