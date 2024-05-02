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
            $table->foreignId('company_id')->nullable();
            $table->string('brand');
            $table->string('name');
            $table->string('color');
            $table->string('model');
            $table->string('car_transmission');
            $table->string('propulsion_type');
            $table->string('engine_type');
            $table->integer('engine_size');
            $table->integer('amount');
            $table->integer('status');
            $table->integer('production_year');
            $table->integer('number_of_rented');
            $table->double('fuel_tank_capacity');
            $table->integer('millage');
            $table->double('price');
            $table->date('date');
            $table->string('image');
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
