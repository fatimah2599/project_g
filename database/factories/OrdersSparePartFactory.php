<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrdersSparePart;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrdersSparePart>
 */
class OrdersSparePartFactory extends Factory
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
            'spare_part_id' => fake()->randomElement([1, 2, 3]),
            'price' => rand(1100, 5100),
            'count' => rand(1, 100)
        ];
    }
}
