<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


// 3b. I defined the columns in the tables that I want to fill with dumb pieces of information
// ------------------------------


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content' => fake()->paragraph(1),
            'user_id' => fake()->numberBetween(1, 20),
            'resource_id' => fake()->numberBetween(1, 20)
        ];
    }
}
