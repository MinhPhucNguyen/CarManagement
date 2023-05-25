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
                'carName' => $faker->name,
                'CarLicensePlate' => $faker->regexify('[A-Z]{2}[0-9]{2}-[A-Z]{2}-[0-9]{2}'),
                'color' => $faker->safeColorName,
                'price' => $faker->randomFloat,
                'image' => $faker->imageUrl(300,300,'cars'),
            ]);
        }
    }
}
