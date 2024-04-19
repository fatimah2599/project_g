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
        $table->id();
        $table->id('externalMaintenanceid');
        $table->id('internalMaintenanceid');
        $table->id('user_id');
        $table->id('car_id');
        $table->id('rent_id');
        $table->id('paid_id');
        $table->id('accessoryPart_id');
        $table->id('sparePart_id');
        $table->id('report_id');
        $table->int('item');
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
