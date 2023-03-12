<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentTest extends TestCase
{
    public function test_user_is_redirected_when_trying_to_access_students_index_page_unauthenticated(): void
    {
        $response = $this->get('/students');

        $response->assertStatus(302);
    }

    public function test_index_page_can_be_rendered_with_an_unauthenticated_user(): void
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->get('/students');

        $response->assertStatus(200);
    }

    /**
     * A test when everything is correct
     */
    public function test_a_new_student_is_properly_stored(): void
    {
        $response = $this->postJson('api/students', [
            'firstname' => 'test',
            'lastname' => 'letest',
            'age' => 32,
        ]);

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'firstname' => 'test',
            'lastname' => 'letest',
            'age' => 32,
        ]);
    }

    /**
     * A test when a required parameter is missing
     */
    public function test_a_new_student_cannot_be_stored_without_a_firstname(): void
    {
        $response = $this->postJson('api/students', [
            'lastname' => 'letest',
            'age' => 32,
        ]);

        $response->assertStatus(422);

        $response->assertJsonFragment(['message' => 'The firstname field is required.']);
    }
}
