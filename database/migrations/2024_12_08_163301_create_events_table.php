<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained();
            $table->foreignId('site_id')->nullable()->constrained();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->integer('ticket_price')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->unique(['name', 'start_date', 'end_date']);
        });
        DB::statement('ALTER TABLE events ADD CONSTRAINT chk_dates CHECK (start_date < end_date)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
