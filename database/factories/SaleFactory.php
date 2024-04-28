<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sale;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => fake()->randomElement([1, 2, 3]),
            'car_id' => fake()->randomElement([1, 2, 3]),
            'price' => rand(1100, 5100),
            'count' => rand(0, 100),
            'type' => fake()->randomElement(['online', 'direct']),
        ];
    }
}
