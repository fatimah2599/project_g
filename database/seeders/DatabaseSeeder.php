<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AccessoryPartsOrder;
use App\Models\AccessoryPart;
use App\Models\Car;
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
    }
}
