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
        $table->string('carModel');
        $table->string('color');
        $table->double('plateNumber');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
