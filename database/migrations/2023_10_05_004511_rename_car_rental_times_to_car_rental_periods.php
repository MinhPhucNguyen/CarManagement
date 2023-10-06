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
        Schema::table('car_rental_periods', function (Blueprint $table) {
            Schema::rename('car_rental_times', 'car_rental_periods');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car_rental_periods', function (Blueprint $table) {
            Schema::rename('car_rental_periods', 'car_rental_times');
        });
    }
};
