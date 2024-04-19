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
        $table->id('sale_id');
        $table->id('rent_id');
        $table->string('name');
        $table->string('type');
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
