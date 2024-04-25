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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
        $table->string('brand');
        $table->string('name');
        $table->string('color');
        $table->string('model');
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
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
