<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $passwordMatch = Hash::check('password', Hash::make('password'));

        for ($i = 0; $i < 25; $i++) {
            DB::table('users')->insert([
                'username' => $faker->userName,
                'email' => $faker->unique()->safeEmail(),
                'phone' => $faker->phoneNumber,
                'password' => Hash::make('password'),
                'confirm_password' => $passwordMatch ? 'true' : 'false',
            ]);
        }
    }
}
