<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClassRoomTest extends TestCase
{
    /**
     * A basic feature test example.
     */
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
