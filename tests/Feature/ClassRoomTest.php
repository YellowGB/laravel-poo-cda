<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClassRoomTest extends TestCase
{
    public function test_classrooms_index_page_can_be_rendered(): void
    {
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
