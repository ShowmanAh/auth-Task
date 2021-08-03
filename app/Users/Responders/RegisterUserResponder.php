<?php

namespace App\Users\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Users\Domain\Resources\UserResource;

class RegisterUserResponder extends Responder implements ResponderInterface
{
    public function respond()
    {
        // if there is any type of error get it's msg and status
        if ($this->response['status'] != 200) {
            return $this->response;
        }
        // else return autherized user and token through userResource
        $this->response['data'] = new UserResource($this->response['data']);
        $this->response['status'] = 201;

        return response()->json($this->response, $this->response['status']);
    }
}
