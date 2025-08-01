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
        Schema::create('trip_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->constrained('registrations')->onDelete('cascade');
            $table->text('visa');
            $table->dateTime('departure_date');
            $table->dateTime('return_date');
            $table->string('gathering_location');
            $table->string('guide_name');
            $table->string('airline');
            $table->string('flight_number');
            $table->text('ticket');
            $table->text('hotel_info');
            $table->text('equipment_info');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_details');
    }
};