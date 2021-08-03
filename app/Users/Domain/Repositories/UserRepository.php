<?php

namespace App\Users\Domain\Repositories;

use App\Users\Domain\Models\User;
use App\App\Domain\Repositories\Repository;


class UserRepository extends Repository
{
    protected $model;
    public function __construct(User $user)
    {
        $this->model = $user;
    }

}
