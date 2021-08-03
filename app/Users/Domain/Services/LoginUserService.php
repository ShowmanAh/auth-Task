<?php

namespace App\Users\Domain\Services;

use Illuminate\Support\Arr;
use App\App\Domain\Services\Service;
use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Payloads\UnauthorizedPayload;

class LoginUserService extends Service
{
    public function handle($data = [])
    {
        if (auth()->attempt(Arr::except($data, 'remember')))
        {
   // dd(auth()->user());
           return new GenericPayload(
               auth()->user()->generateAuthToken(),
               200
           );

        }

            return new UnauthorizedPayload;
        }
    }

