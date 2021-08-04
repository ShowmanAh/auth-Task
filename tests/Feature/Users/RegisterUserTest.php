<?php

namespace Tests\Feature\Users;

use Tests\TestCase;
use App\Users\Domain\Models\User;

class RegisterUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_it_couldonot_user_register_if_email_exists()
    {
        $user = factory(User::class)->create([
            'email' => 'showman.sh.ahmed@gmail.com',
            'email' => 'showman.sh.ahmed@gmail.com',
        ]);

        $this->post(
            '/api/register',
            array_merge($user->toArray(), [
                'password' => 'secret123',
                'password_confirmation' => 'secret123',
            ])
        )->assertStatus(422)->assertJsonStructure([
            'errors' => ['email'],
        ]);
    }
    public function test_it_registers_user_with_correct_data()
    {
        $user = factory(User::class)->make([
            'name' => 'showman22',
            'email' => 'showman22@gmail.com',
        ]);
        $response = $this->post(
            '/api/register',
            array_merge($user->toArray(), [
                'password' => 'secret123',
                'password_confirmation' => 'secret123',
            ])
        )->assertStatus(201);
    }
}
