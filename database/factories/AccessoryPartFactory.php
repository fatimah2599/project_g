<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccessoryPart>
 */
class AccessoryPartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['test', 'test']),
            'brand' => fake()->randomElement(['BMW', 'Tesla']),
            'description' => fake()->randomElement(['hhhhhhhhhhh', 'Tesla']),
            'material' => fake()->randomElement(['iron', 'test material']),
            'price' => rand(1, 1000),
            'amount' => rand(1, 500),
            'feature' => fake()->randomElement(['test feature', 'test feature']),
            'availability_colors' => fake()->randomElement(['red', 'black', 'white', 'blue']),
            'image' => fake()->image(),
        ];
    }
}
