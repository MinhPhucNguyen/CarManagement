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
        Schema::table('users', function (Blueprint $table) {
            $table->tinyText('phone')->after('email');
            $table->string('address')->after('phone');
            $table->string('avatar')->default('default.jpg');
            $table->tinyInteger('status')->default('0')->comment('0=inactive, 1=active');
            $table->tinyInteger('role_as')->default('0')->comment('0=user, 1=admin');
            $table->string('confirm_password')->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_as');
        });
    }
};
