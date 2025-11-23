<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       foreach (['Plumbing','Electrical','Carpentry','Painting','HVAC'] as $name) {
            Service::firstOrCreate(['name' => $name], [
                'description' => '',
                'min_price'   => 50,
            ]);
        }
    }
}
