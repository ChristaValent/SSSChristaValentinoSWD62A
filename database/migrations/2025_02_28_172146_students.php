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
        Schema::create('students', function (Blueprint $table) {
            $table->id(); //id() automatically creates an auto-incrementing id column
            $table->string('name'); //automatically required
            $table->string('email')->unique(); //automatically required and unique
            $table->string('phone');
            $table->date('dob');
            $table->foreignId('college_id')->constrained()->onDelete('cascade'); //foreign key constraint and delete students if college is deleted
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students'); //drop the students table if it already exists
    }
};
