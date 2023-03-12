<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
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
