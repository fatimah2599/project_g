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

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AccessoryPartSeeder::class);
        $this->call(AccessoryPartsOrderSeeder::class);
        $this->call(CarSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(ExternalMaintenanceSeeder::class);
        $this->call(InternalMaintenanceSeeder::class);
        $this->call(Order::class);
        $this->call(OrdersSparePart::class);
        $this->call(Reservation::class);
        $this->call(Sale::class);
        $this->call(SparePart::class);
    }
}
