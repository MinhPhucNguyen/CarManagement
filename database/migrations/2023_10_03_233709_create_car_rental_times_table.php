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
        Schema::create('car_rental_times', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('car_id');
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->boolean('is_active')->default(true)->comment('0=inactive, 1=active');
            $table->timestamps();

            $table->foreign('car_id')->references('car_id')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_rental_times');
    }
};
