<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountConsoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_handle_admin_changing_password()
    {
        $user = User::factory()->create();

        $this->artisan('account')
            ->expectsQuestion('What is your email?', $user->email)
            ->expectsQuestion('Enter your password?', 'password')
            ->expectsQuestion('new password:', 'new_pass')
            ->expectsQuestion('confirm password:', 'new_pass')
            ->assertExitCode(0);

        $credentials = ['email' => $user->email, 'password' => 'new_pass'];

        $this->mockPassportAccessToken($credentials);

        $this->post('/login', $credentials)->assertOk();
    }
}
