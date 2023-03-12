<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ClassRoom;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Student::factory(8)->create();
        User::factory(3)->create();

        for ($i = 0; $i < 10; $i++) {
            ClassRoom::factory()->create();
        }
    }
}
