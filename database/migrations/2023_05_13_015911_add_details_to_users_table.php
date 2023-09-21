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
            $table->string('firstname')->after('id')->nullable();
            $table->string('lastname')->after('firstname')->nullable();
            $table->tinyInteger('gender')->default(1)->comment('0=female, 1=male')->after('username');
            $table->tinyText('phone')->after('email')->nullable();
            $table->string('address')->after('phone')->nullable();
            $table->string('avatar')->default('default.jpg');
            $table->tinyInteger('status')->default(0)->comment('0=inactive, 1=active');
            $table->tinyInteger('role_as')->default(0)->comment('0=user, 1=admin');
            $table->string('confirm_password')->after('password')->nullable();
            $table->date('birth')->after('gender')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('gender');
            $table->dropColumn('avatar');
            $table->dropColumn('status');
            $table->dropColumn('role_as');
            $table->dropColumn('confirm_password');
            $table->dropColumn('birth');
        });
    }
};
