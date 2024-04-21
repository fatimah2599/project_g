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
        $table->string('made');
        $table->string('model');
        $table->string('company');
        $table->integer('pieceNumber');
        $table->double('price');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
