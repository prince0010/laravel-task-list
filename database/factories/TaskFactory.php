<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //The title, paragraph without () boolean is a properties if there is () it means a function
            'title' => fake()->sentence,
            'description'=> fake()->paragraph,
            // 7 is how many sentence in the paragraph and will set it as true 
            'long_description' => fake()->paragraph(7, true),
            'completed' => fake()->boolean,


        ];
    }
}
