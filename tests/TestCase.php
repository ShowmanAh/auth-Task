<?php

namespace Tests;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;
    public function setUp(): void
    {
      parent::setUp();

      $this->app->make(EloquentFactory::class)->load(__DIR__ . '/../database/factories');
    }

    public function jsonAs(JWTSubject $user, $method, $endpoint, $data = [], $headers = [])
    {
        $token = auth('api')->tokenById($user->id);
        return $this->json($method, $endpoint, $data, array_merge($headers, [
            'Authorization' => 'Bearer ' . $token,
        ]));
    }
}
