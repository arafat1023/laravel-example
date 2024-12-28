<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectDetail;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Project::factory(5)->create()->each(function ($project) {
            // Create ProjectDetail (One-to-One)
            ProjectDetail::factory()->create(['project_id' => $project->id]);

            // Create Tasks (One-to-Many)
            Task::factory(rand(2, 5))->create(['project_id' => $project->id]);

            // Create and attach Users (Many-to-Many)
            $users = User::factory(rand(1, 3))->create(); // Create 1-3 users
            $project->users()->attach($users); // Attach users to the project
        });
    }
}
