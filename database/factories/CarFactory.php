<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;


use Carbon\Carbon;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

//     $factory->define(App\Car::class, function (Faker $faker)
    public function definition(): array
    {
        $randomDate = Carbon::now()->subDays(rand(1, 365));
        return [
            'name' => fake()->randomElement(['test', 'test']),
            'brand' => fake()->randomElement(['BMW', 'Tesla']),
            'amount' => rand(1, 100),
            'engine_type' => fake()->randomElement(['gasoline engine', 'Tesla']),
            'price' => rand(1, 1000),
            'engine_size' => rand(0, 2),
            'car_transmission' => fake()->randomElement(['Rrrr', 'Tesla']),
            'model' => fake()->randomElement(['Rio', 'Tesla']),
            'propulsion_type' => fake()->randomElement(['front-wheel drive', 'test']),
            'status' => rand(0, 5),
            'number_of_rented' => rand(0, 100),
            'fuel_tank_capacity' => rand(0, 1000),
            'millage' => rand(0, 1000),
            'color' => fake()->randomElement(['red', 'black', 'white', 'blue']),


            'company_id' =>  Company::all()->random()->id,
            'production_year' => rand(1960, 2024),
            'date' => $randomDate,
            //'updated_at' => Carbon::now(),
            //'created_at' => Carbon::now(),
        ];
    }
}
/**
 *    *'production_year', yet
           *'date',
             *'company_id',
 * 
 * 
 * 
 * 'id',
  *      'name',  done
   *     'brand',  done
    *    'amount', done
     *   'engine_type',  done 
      *  'price',  done
       * 'engine_size', done
        *'car_transmission', done
        *'model', done
        *'propulsion_type', done
        *'status', done
        *'number_of_rented', done
        *'fuel_tank_capacity', done
        *'millage', done
        *'color' done
 */