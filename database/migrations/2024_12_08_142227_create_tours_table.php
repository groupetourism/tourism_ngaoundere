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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('site_id')->constrained();
            $table->foreignId('accommodation_id')->nullable()->constrained();
            $table->foreignId('vehicle_id')->nullable()->constrained();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
//            $table->foreignId('reservation_id')->nullable()->constrained(); // ids[]
//            $table->integer('number_of_persons')->nullable();
//            $table->float('total_cost');
            $table->unique(['user_id', 'site_id', 'start_date', 'end_date']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
