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
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained();
            $table->enum('type', [1, 2, 3, 4, 5, 6]); //hotel, resto, loisir, hopital, agence voyage, auberge
            $table->string('name');
            $table->longText('description')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('promoter')->nullable();

            $table->integer('number_of_stars')->nullable();
            $table->integer('number_of_rooms')->nullable();
            $table->integer('number_of_beds')->nullable();
            $table->integer('restaurant_capacity')->nullable();
            $table->integer('bar_capacity')->nullable();
            $table->integer('conference_room_capacity')->nullable();
            $table->integer('capacity')->nullable();
            $table->boolean('parking')->nullable();
            $table->boolean('is_public')->nullable();

            $table->string('image')->nullable();
            $table->string('contact_info')->nullable();
            $table->string('website')->nullable();
            $table->unique(['name', 'latitude', 'longitude']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodations');
    }
};
