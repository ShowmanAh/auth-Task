<?php

namespace App\Users\Domain\Pipelines;

use Illuminate\Support\Arr;
use App\App\Domain\Contracts\Pipeline;
use App\Users\Domain\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class CreateUserPipeline implements Pipeline
{
    protected $users;
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function handle($data, \Closure $next)
    {
      if(Arr::has($data, 'password')){
          $data['password'] = bcrypt(request()->password);
      }

       // $user = $this->users->create(Arr::except($data, ['role'])); // remove given key/value from array
        $user = $this->users->create(Arr::except($data, ['slug']));
       // $this->roles->findRoleBySlug($data['slug'])->users()->attach($user);
        return $next([$data, $user]);
    }

}
