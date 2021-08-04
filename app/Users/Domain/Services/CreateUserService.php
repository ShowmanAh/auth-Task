<?php

namespace App\Users\Domain\Services;

use Illuminate\Support\Arr;
use App\App\Domain\Services\Service;
use Illuminate\Support\Facades\Gate;
use App\App\Domain\Payloads\GenericPayload;
use App\App\Domain\Payloads\ValidationPayload;
use App\App\Domain\Payloads\UnauthorizedPayload;
use App\Users\Domain\Repositories\RoleRepository;
use App\Users\Domain\Repositories\UserRepository;

class CreateUserService extends Service
{
    protected $users;
    protected $roles;
    public function __construct(UserRepository $users, RoleRepository $roles)
    {
        $this->users = $users;
        $this->roles = $roles;
    }
    public function handle($data = []){

        if (Gate::allows('isAdmin')) {
            try {
                // encrypt password
                $data['password'] = bcrypt($data['password']);

                $user = $this->users->create(Arr::except($data, ['slug']));
                // find the role by slug then attach it in pivot table to this user
                $this->roles->findRoleBySlug($data['slug'])->users()->attach($user);
                // retur success message
                return new GenericPayload([
                    'message' => 'User Created Successfully',
                ], 201);
            } catch (Exception $e) {
                return new ValidationPayload($e);
            }
        }
        return new UnauthorizedPayload;
    }
}
