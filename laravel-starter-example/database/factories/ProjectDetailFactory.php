<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProjectDetail;
use App\Models\Project;

class ProjectDetailFactory extends Factory
{
    protected $model = ProjectDetail::class;

    public function definition()
    {
        return [
            'project_id' => Project::factory(), // Ensure this references the correct Project namespace
            'client_name' => $this->faker->name,
            'deadline' => $this->faker->date,
            'budget' => $this->faker->randomFloat(2, 1000, 100000),
        ];
    }
}
