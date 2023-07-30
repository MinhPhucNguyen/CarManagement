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
        Schema::create('car_feature', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('car_id');
            $table->unsignedInteger('feature_id');
           
            $table->foreign('car_id')->references('car_id')->on('cars')->onDelete('cascade');
            $table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_feature');
    }
};
