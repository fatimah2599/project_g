<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrdersSparePart;
use App\Models\SparePart;

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
            'order_id' => Order::all()->random()->id,
            'spare_part_id' => SparePart::all()->random()->id,
            'price' => rand(1100, 5100),
            'count' => rand(1, 100)
        ];
    }
}
