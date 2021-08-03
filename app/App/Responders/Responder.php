<?php

namespace App\App\Responders;

abstract class Responder
{
    protected $response;

    public function withResponse($response)
    {
        $this->response = [
            'status' => $response->getStatus(),
            'data' => $response->getData(),
        ];

        return $this;
    }
}
