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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            //$table->id('booking_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('services_id');
            $table->string('user_name');
            //$table->date('booking_date')->default(now());
            //$table->timestamp('booking_time')->default(now());
            $table->string('services_name');
            //$table->text('note');       
            $table->enum('rate',[1,2,3,4,5]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
