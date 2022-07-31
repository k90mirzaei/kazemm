<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RefreshTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_user_can_refresh_access_token()
    {
        $this->mockPassportAccessToken();

        $this->be(User::factory()->create());

        $this->get('/refresh')->assertStatus(200);
    }
}
