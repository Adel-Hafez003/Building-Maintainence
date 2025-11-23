<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Al-Mazzeh','Barzeh','Al-Maliki','Kafr Sousa','Al-Marjeh'] as $name) {
            Region::firstOrCreate(
                ['name' => $name],
                ['latitude' => fake()->randomFloat(8, 33.40, 33.60),
                 'longitude'=> fake()->randomFloat(8, 36.15, 36.40)]
            );
        }
        // أو Region::factory()->count(5)->create(); إذا الFactory يضمن unique('name')
    }
}
