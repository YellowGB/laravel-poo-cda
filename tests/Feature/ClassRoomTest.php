<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClassRoomTest extends TestCase
{
    public function test_classroom_page_can_be_rendered_with_guest(): void
    {
        $response = $this->get('/classrooms');

        $response->assertStatus(200);
    }

    public function test_classroom_page_can_be_rendered_with_authenticated_user(): void
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->get('/classrooms');

        $response->assertStatus(200);
    }

    public function test_new_classroom_is_stored_correctly(): void
    {
        $name = fake()->city();

        $response = $this->postJson('api/classrooms', [
            'name' => $name,
            'capacity' => 40,
        ]);

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'name' => $name,
            'capacity' => 40,
        ]);
    }
}
