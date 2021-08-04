<?php

namespace App\Users\Responders;

use App\App\Responders\Responder;
use App\App\Responders\ResponderInterface;
use App\Users\Domain\Resources\UserResource;

class ChangeUserRoleResponder extends Responder implements ResponderInterface {
	public function respond() {
		if ($this->response['status'] != 200) {
			return $this->response;
		}

		$this->response['data'] = new UserResource($this->response['data']);
		return $this->response;
	}
}
