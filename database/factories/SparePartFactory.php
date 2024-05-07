<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SparePart;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SparePartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::all()->random()->id,
            'price' => rand(1100, 5100),
            'piece_number' => rand(0, 500),
            'name' => fake()->randomElement(['hhookk', 'pjjkkk']),
            'made' => fake()->randomElement(['kkge', 'lkppo']),
            'model' => fake()->randomElement(['jj100', 'kk500']),
            'image' => fake()->image()
        ];
    }
}
