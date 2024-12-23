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
            $table->enum('type', [1, 2, 3]);
            $table->string('license_plate')->unique();
            $table->integer('provider_name');
            $table->integer('description')->nullable();
            $table->integer('number_of_places');
            $table->integer('price_per_hour');
            $table->boolean('is_available');
            $table->string('image_url')->nullable();
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
