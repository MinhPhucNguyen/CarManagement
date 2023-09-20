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
            // $table->string('firstname')->after('id');
            // $table->string('lastname')->after('firstname');
            $table->tinyInteger('gender')->comment('0=female, 1=male')->after('username')->nullable();
            // $table->tinyText('phone')->after('email');
            // $table->string('address')->after('phone');
            // $table->string('avatar')->default('default.jpg');
            // $table->tinyInteger('status')->default('0')->comment('0=inactive, 1=active');
            // $table->tinyInteger('role_as')->default('0')->comment('0=user, 1=admin');
            // $table->string('confirm_password')->after('password');
            // $table->date('birth')->after('gender')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // $table->dropColumn('address');
            $table->dropColumn('gender');
            // $table->dropColumn('avatar');
            // $table->dropColumn('status');
            // $table->dropColumn('role_as');
            // $table->dropColumn('confirm_password');
            // $table->dropColumn('birth');
        });
    }
};