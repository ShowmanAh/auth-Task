<?php
namespace App\App\Domain\Services;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Service
{
    // to be able to use authorize() to auth action for current user
    use AuthorizesRequests;
    abstract public function handle();
}
