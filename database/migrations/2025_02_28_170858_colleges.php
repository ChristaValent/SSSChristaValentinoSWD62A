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
        // Create colleges table
        Schema::create('colleges', function (Blueprint $table) {
            $table->id(); //id() automatically creates an auto-incrementing id column
            $table->string('name')->unique();
            $table->string('address'); //automatically required
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colleges'); //drop the colleges table if it already exists
    }
};
