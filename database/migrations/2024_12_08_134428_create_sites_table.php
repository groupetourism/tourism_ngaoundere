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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained();
            $table->string('name')->unique();
            $table->longText('description')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->string('visite_periode')->nullable();
            $table->string('access_means')->nullable(); //new table for filtering
            $table->string('offered_service')->nullable(); //new table
            $table->longText('cultural_info')->nullable() ;
//            $table->json('opening_hours');
            $table->integer('ticket_price')->nullable();
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
        Schema::dropIfExists('sites');
    }
};
