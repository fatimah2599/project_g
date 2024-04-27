<?php

namespace Database\Factories;

use App\Models\AccessoryPart;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccessoryPartsOrder>
 */
class AccessoryPartsOrderFactory extends Factory
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
            'accessory_part_id' =>  AccessoryPart::all()->random()->id,
            'count' => rand(1, 50),
            'price' => rand(1, 1000)
        ];
    }
}
