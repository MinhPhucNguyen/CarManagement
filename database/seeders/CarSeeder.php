<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Car;
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
        $fuels = ['Petrol', 'Diesel'];
        $brands = Brand::all();
        for ($i = 0; $i < 25; $i++) {

            $brand = $faker->randomElement($brands);

            Car::create([
                'car_name' => $faker->regexify('/[A-Za-z][0-9]/'),
                'price' => $faker->randomFloat(2, 100, 200),
                'description' => $faker->paragraph(),
                'seats' => $faker->numberBetween(4,10),
                'fuel' => $faker->randomElement($fuels),
                'year' => $faker->year(),
                'speed' => $faker->numberBetween(300,800),
                'capacity' => $faker->numberBetween(300,500),
                'brand_id' => $brand->brand_id,
            ]);
        }
    }
}
