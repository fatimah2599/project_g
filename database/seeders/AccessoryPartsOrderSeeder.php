<?php

namespace Database\Seeders;

use App\Models\AccessoryPartsOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessoryPartsOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AccessoryPartsOrder::factory()->count(100)->create();
    }
}
