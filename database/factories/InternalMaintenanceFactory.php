<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\InternalMaintenance;
use App\Models\Order;
use App\Models\User;

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
            'company_id' =>  Company::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'order_id' => Order::all()->random()->id,
        ];
    }
}
