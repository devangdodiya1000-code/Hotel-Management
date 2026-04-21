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
            // Room relation
            $table->foreignId('room_id')->constrained()->onDelete('cascade');

            // User (optional for now)
            $table->string('customer_name')->nullable();
            $table->string('email')->nullable();

            // Payment info
            $table->string('payment_intent_id')->nullable();
            $table->string('payment_status')->default('pending'); // pending, success, failed
            $table->integer('amount');

            // Booking info
            $table->date('check_in')->nullable();
            $table->date('check_out')->nullable();
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
