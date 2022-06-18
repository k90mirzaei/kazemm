<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Work;
use Database\Seeders\WorkSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class WorkTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function everybody_can_see_works()
    {
        $this->seed(WorkSeeder::class);

        $this->assertEquals(5, Work::all()->count());

        $this->get('/works')->assertOk();
    }

    /** @test */
    public function everybody_can_see_work_details()
    {
        $this->seed(WorkSeeder::class);

        $work = Work::first();

        $this->get('/works/' . $work->slug)->assertOk();
    }

    /** @test */
    public function guest_cannot_change_any_work_data()
    {
        $work = Work::factory()->create();

        $this->post('/works', [], ['Accept' => 'application/json'])->assertStatus(401);
        $this->patch('/works/' . $work->id, [])->assertStatus(401);
        $this->delete('/works/' . $work->id)->assertStatus(401);
    }

    /** @test */
    public function admin_can_create_a_work()
    {
        $data = [
            'title' => 'title',
            'slug' => 'slug',
            'body' => 'body',
        ];

        Passport::actingAs(User::factory()->create());

        $this->post('/works', $data)->assertOk();

        $this->assertDatabaseHas('works', $data);
    }

    /** @test */
    public function admin_can_update_a_work()
    {
        $this->withoutExceptionHandling();

        $work = Work::factory()->create();

        Passport::actingAs(User::factory()->create());

        $this->patch('/works/' . $work->slug, [
            'title' => 'changed'
        ])->assertOk();

        $this->assertEquals('changed', Work::first()->title);
    }

    /** @test */
    public function admin_can_delete_a_work()
    {
        Passport::actingAs(User::factory()->create());

        $work = Work::factory()->create();

        $this->delete('/works/' . $work->slug)->assertOk();

        $this->assertEquals(0, Work::count());
    }
}
