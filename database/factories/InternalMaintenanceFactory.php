<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\InternalMaintenance;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InternalMaintenance>
 */
class InternalMaintenanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => fake()->randomElement([1, 2, 3]),
            'user_id' => fake()->randomElement([1, 2, 3]),
            'order_id' => fake()->randomElement([1, 2, 3])
        ];
    }
}
