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
        Schema::table('cars', function (Blueprint $table) {
            // $table->string('transmission')->comment('0=automatic; 1=manual')->after('capacity');
            // $table->string('number_of_trip')->after('transmission');
            // $table->tinyInteger('status')->default(0);
            // $table->string('location');
            // $table->string('delivery_enable');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            //
        });
    }
};