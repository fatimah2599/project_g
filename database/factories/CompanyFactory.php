<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['galaxy', 'marc']),
            'capacity' => fake()->randomElement(['hhhhhh', 'kkkkkkk']),
            'cost' => rand(1000, 3000),
            'address' => fake()->randomElement(['paris', 'makka']),
            'quality' => fake()->randomElement(['good', 'super']),
            'founding' => fake()->randomElement(['always', 'often']),
            'pricing' => rand(1000, 5000)
           
        ];
    }
}

