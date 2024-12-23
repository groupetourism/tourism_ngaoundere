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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->float('total_price');
            $table->enum('status', [0, 1, -1]);
            $table->morphs('reservable');
            $table->timestamps();
            //ne pas faire une reservation pr la mm periode pr 1 mm type de modèle reservable par un mm user
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
