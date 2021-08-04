<?php

namespace App\Users\Domain\Services;

use App\App\Domain\Contracts\ServiceInterface;
use App\App\Domain\Payloads\GenericPayload;
use App\Users\Domain\Pipelines\AttachUserToRolePipeline;
use App\Users\Domain\Pipelines\CreateUserPipeline;
use Illuminate\Pipeline\Pipeline;

class RegisterUserService implements ServiceInterface
{
    public function handle($data = [])
    {
        $pipes = [
            CreateUserPipeline::class,
            AttachUserToRolePipeline::class,
        ];

        $user = app(Pipeline::class)->send($data)->through($pipes)->then(
            function ($user) {
                return $user;
            }
        );
        return new GenericPayload($user);
    }
}
