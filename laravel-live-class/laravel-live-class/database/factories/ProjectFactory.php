<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3), // Random 3-word title
            'description' => $this->faker->paragraph, // Random paragraph
            'status' => $this->faker->randomElement(['pending', 'in-progress', 'completed']),
        ];
    }
}
