<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


// 3a. I defined the columns in the tables that I want to fill with dumb pieces of information
// ------------------------------

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => fake()->numberBetween(1, 6),
            'name' => fake()->sentence(),
            'logo' => fake()->image('storage/app/public/logos', 640, 480, null, false)
            //'resource_id' => fake()->numberBetween(1, 26)
        ];
    }
}
