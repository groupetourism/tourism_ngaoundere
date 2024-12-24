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
            $table->enum('type', [1, 2, 3]);
            $table->string('name')->unique();
            $table->longText('description');
            $table->double('latitude');
            $table->double('longitude');

            $table->integer('price_per_day')->nullable();
            $table->integer('number_of_stars')->nullable();
            $table->integer('number_of_parlors')->nullable();
            $table->integer('number_of_rooms')->nullable();
            $table->integer('number_of_kitchens')->nullable();
            $table->integer('number_of_bathroom')->nullable();
            $table->integer('number_of_shower')->nullable();
            $table->boolean('balcony')->nullable();
            $table->boolean('parking')->nullable();

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
        Schema::dropIfExists('hotels');
    }
};
