<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Faker\Provider\Image as ImageProvider;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
       

        foreach (range(1, 50) as $index) {
            DB::table('cars')->insert([
                'name' => $faker->name,
                'price' => $faker->boolean,
                'image' => $faker->sentence,
            ]);
        }
    }
}
