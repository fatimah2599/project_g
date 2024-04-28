<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomDate = Carbon::now()->subDays(rand(1, 365));
        return [
            'user_id' => fake()->randomElement([1, 2, 3]),
            'total_price' => rand(1100, 5100),
            'date' => $randomDate,
        ];
    }
}
