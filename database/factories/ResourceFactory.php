<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


// 3c. I defined the columns in the tables that I want to fill with dumb pieces of information
// ------------------------------



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resource>
 */
class ResourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'image' => fake()->image('storage/app/public/img/', 640, 480, null, false),
            'size' => fake()->numberBetween(300, 5999),
            'description' => fake()->paragraph(3),
            'user_id' => fake()->numberBetween(1, 20),
            'category_id' => fake()->numberBetween(1, 6)
        ];
    }
}
