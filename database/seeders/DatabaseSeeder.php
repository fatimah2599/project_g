<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AccessoryPartsOrder;
use App\Models\AccessoryPart;
use App\Models\Car;
use App\Models\Company;
use App\Models\ExternalMaintenance;
use App\Models\InternalMaintenance;
use App\Models\Order;
use App\Models\OrdersSparePart;
use App\Models\Reservation;
use App\Models\Sale;
use App\Models\SparePart;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create admin
        User::firstOrCreate(
            [
                'firstName' => 'Super',
                'lastName' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('admin1234'),
                'confirm_password' => bcrypt('admin1234'),
                'profile_photo_path' => null,
                'current_team_id' => null,
                'role' => 1, // admin,
                'phone' => '00991123123',
                'car_color' => 'black',
                'plate_number' => '12345',
                'car_model' => '2024',
                'car_brand' => 'BMW'
            ]
        );
        // create fake user
        User::factory()->count(20)->create();

        $this->call(AccessoryPartSeeder::class);
        $this->call(AccessoryPartsOrderSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(SparePartSeeder::class);
        $this->call(OrdersSparePartSeeder::class);
        $this->call(CarSeeder::class);
        $this->call(ExternalMaintenanceSeeder::class);
        $this->call(InternalMaintenanceSeeder::class);
        $this->call(ReservationSeeder::class);
        $this->call(SaleSeeder::class);
    }
}
