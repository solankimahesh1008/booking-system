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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->date('booking_date')->nullable();
            $table->enum('booking_type', ['Full Day', 'Half Day', 'Custom'])->nullable();
            $table->enum('booking_slot', ['First Half', 'Secound Half'])->nullable();
            $table->dateTime('booking_from')->nullable();
            $table->dateTime('booking_to')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
