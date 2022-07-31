<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_login_with_valid_credentials()
    {
        $user = User::factory()->create();

        $credentials = ['email' => $user->email, 'password' => 'password'];

        $this->mockPassportAccessToken($credentials);

        $this->post('/login', $credentials)->assertOk();
    }

    /** @test */
    public function a_user_can_not_login_by_invalid_credential()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => 'wrong',
            'password' => 'wrong'
        ])->assertStatus(422);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong'
        ])->assertStatus(401);
    }
}
