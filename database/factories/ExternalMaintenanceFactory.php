<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ExternalMaintenance;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExternalMaintenance>
 */
class ExternalMaintenanceFactory extends Factory
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
            'order_id' => fake()->randomElement([1, 2, 3]),
            'location' => fake()->randomElement(['barza', 'midan'])
        ];
    }
}


