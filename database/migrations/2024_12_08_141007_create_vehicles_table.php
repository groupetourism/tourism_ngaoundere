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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained();
            $table->enum('type', [1, 2, 3]); //1=taxi, 2=voiture de location, 3=bus
            $table->string('license_plate')->unique();
            $table->string('provider_name');
            $table->longText('description')->nullable();
            $table->integer('number_of_seats');
            $table->integer('price_per_hour');
            $table->boolean('is_available');
            $table->string('image')->nullable();
            $table->string('contact_info')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
