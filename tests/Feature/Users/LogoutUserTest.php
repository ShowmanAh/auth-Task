<?php

namespace Tests\Feature\Users;

use Tests\TestCase;
use App\Users\Domain\Models\User;

class LogoutUserTest extends TestCase
{
    /** @test */
    public function it_logsout_user_successfully()
    {
        $user = factory(User::class)->create();
        $this->jsonAs($user, 'POST', '/api/logout')->assertStatus(200);
    }
}
