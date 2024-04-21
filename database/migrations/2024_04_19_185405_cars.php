<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $table->id('company_id');
        $table->id('sale_id');
        $table->id('offer_id');
        $table->string('brand');
        $table->string('name');
        $table->double('price');
        $table->string('color');
        $table->string('model');
        $table->string('color');
        $table->string('carTransmission');
        $table->string('propulsionType');
        $table->string('enginType');
        $table->integer('engineSize');
        $table->integer('amount');
        $table->integer('status');
        $table->integer('productionYear');
        $table->integer('numberOfRented');
        $table->double('fuelTankCapacity');
        $table->integer('millage');
        $table->double('price');
        $table->date('date');
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
