<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create(); // مولّد بيانات وهمية

        foreach (['Al-Mazzeh','Barzeh','Al-Maliki','Kafr Sousa','Al-Marjeh'] as $name) {
            Region::firstOrCreate(
                ['name' => $name],
                [
                    'latitude'  => $faker->randomFloat(8, 33.40, 33.60),
                    'longitude' => $faker->randomFloat(8, 36.15, 36.40),
                ]
            );
        }
    }
}
