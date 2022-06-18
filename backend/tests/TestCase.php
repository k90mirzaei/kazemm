<?php

namespace Tests;

use App\Http\Authentication\AuthRequest;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        $this->withHeaders([
            "Accept" => "application/json"
        ]);
    }

    protected function mockPassportAccessToken($credentials = null)
    {
        $mock = \Mockery::mock(AuthRequest::class);

        $mock->shouldReceive('grantPasswordToken')
            ->with($credentials ?? ['email' => 'admin@app.io', 'password' => 'password'])
            ->andReturn((object)['access_token' => 'access_token']);

        $mock->shouldReceive('refreshAccessToken')
            ->andReturn((object)['access_token' => 'access_token']);

        app()->instance(AuthRequest::class, $mock);

    }
}
