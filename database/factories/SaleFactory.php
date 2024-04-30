<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Order;
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
            'order_id' => Order::all()->random()->id,
            'car_id' => Car::all()->random()->id,
            'price' => rand(1100, 5100),
            'count' => rand(0, 100),
            'type' => fake()->randomElement(['online', 'direct']),
        ];
    }
}
