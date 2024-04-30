<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\Reservation;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
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
            'user_id' => User::all()->random()->id,
            'car_id' => Car::all()->random()->id,
            'cost' => rand(1100, 5100),
            'value' => rand(200, 500),
            'period' => rand(300, 700),
            'status' => rand(0, 10),
            'info' => fake()->randomElement(['hhkkkkk', 'ppppkkk']),
            'type' => fake()->randomElement(['jgkfl', 'llooo']),
            'date' => $randomDate,
        ];
    }
}
