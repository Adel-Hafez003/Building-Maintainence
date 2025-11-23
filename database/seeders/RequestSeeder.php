<?php

namespace Database\Seeders;

use App\Models\Request;
use App\Models\Region;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    public function run(): void
    {
        // لو بتحب عشوائي بسيط لكن مرتبط ببيانات موجودة:
        Request::factory()
            ->count(30)
            ->state(function () {
                return [
                    'tenant_id'   => User::where('role','tenant')->inRandomOrder()->value('id'),//ليربطه بالطلب الجديد idثم يختار واحدا منهم بشكل عشوائي ويستخرج معرفه ال 'tenant'يختار فقط  المستخدمين الذين لديهم الدور  userهنا يذهب لجدول ال 
                    'technician_id' => User::where('role','technician')->inRandomOrder()->value('id'), 
                    'region_id'   => Region::inRandomOrder()->value('id'),
                    'service_id'  => Service::inRandomOrder()->value('id'),
                ];
            })
            ->create();
    }
}
