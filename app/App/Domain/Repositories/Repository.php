<?php
namespace App\App\Domain\Repositories;

use App\App\Domain\Contracts\RepositoryInterface;
use Illuminate\Support\Str;

abstract class Repository implements RepositoryInterface
{


    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }


}
