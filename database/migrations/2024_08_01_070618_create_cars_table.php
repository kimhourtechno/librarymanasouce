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
            $table->string('make'); // e.g., Toyota, Honda
            $table->string('model'); // e.g., Camry, Accord
            $table->year('year'); // e.g., 2024
            $table->string('color')->nullable(); // e.g., Red, Blue
            $table->string('vin')->unique(); // Vehicle Identification Number
            $table->decimal('price', 10, 2); // e.g., 25000.00
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
