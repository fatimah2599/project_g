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
        $table->string('name');
        $table->string('capacity');
        $table->string('address');
        $table->int('cost');
        $table->string('quality');
        $table->string('founding');
        $table->string('pricing');
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
