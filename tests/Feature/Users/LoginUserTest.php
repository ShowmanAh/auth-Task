<?php

namespace Tests\Feature\Users;

use Tests\TestCase;
use App\Users\Domain\Models\User;

class LoginUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // test validation

    public function test_it_couldnot_user_login_if_not_pass_validation()
    {
        $this->post(
            '/api/login',
            [
                'email' => 'someone',
                'password' => 'secret',
            ]
        )->assertStatus(422);
    }
    // test login with inccorect crdentials & activated

    public function test_it_coudnot_user_login_if_invalid_credentials()
    {
        $user = factory('App\Users\Domain\Models\User')->create([
            'name' => 'showman55',
            'email' => 'showman.ahmed@gmail.com',
            'password' => bcrypt('secret123'),
        ]);

        $response = $this->post(
            '/api/login',
            [
                'email' => 'asd@gmail.com',
                'password' => 'secretsecret',
            ]
        )->assertStatus(422);
    }

    public function test_it_login_user_if_crdentials_is_correct()
    {
        $user = factory(User::class)->create([
            'name' => 'showman55',
            'email' => 'showman.ahmed@gmail.com',
            'password' => bcrypt('secret123'),
        ]);



        $response = $this->post(
            '/api/login',
            [
                'email' => 'showman.ahmed@gmail.com',
                'password' => 'secret123',
            ]
        )->assertStatus(200);
    }
}
