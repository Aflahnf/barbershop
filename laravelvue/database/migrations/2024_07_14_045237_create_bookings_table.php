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
            $table->id('id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->foreignId('services_id');
            // $table->string('user_name');
            $table->date('booking_date')->default(now());
            $table->time('booking_time')->default(now());
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->foreignId('hairstylist_id')->constrained()->onDelete('cascade');
            $table->text('note');       
            $table->enum('booking_status', ['wait','on progres']);
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
