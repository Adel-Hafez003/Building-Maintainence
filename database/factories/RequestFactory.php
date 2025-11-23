<?php

namespace Database\Factories;

use App\Models\Region;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequestFactory extends Factory
{
    public function definition(): array
    {
        $region  = Region::inRandomOrder()->first() ?? Region::factory()->create();
        $service = Service::inRandomOrder()->first() ?? Service::factory()->create();
        $tenant  = User::factory()->tenant()->create(['region_id' => $region->id]);

        $date = $this->faker->dateTimeBetween('now', '+7 days');

        return [
            'tenant_id'      => $tenant->id,
            'technician_id'  => null, // يُمكن تعيينه بعدين حسب التخصص/المنطقة
            'service_id'     => $service->id,
            'region_id'      => $region->id,
            'status'         => $this->faker->randomElement(['pending','accepted','on_the_way','complete','canceled',]),
            'title'          => $this->faker->words(3, true),
            'description'    => $this->faker->sentence(12),
            'address_text'   => $this->faker->streetAddress(),
            'scheduled_date' => $date->format('Y-m-d'),
            'scheduled_time' => $date->format('H:i:s'),
            'cancellation_reason' => null,
            'canceled_at'    => null,
        ];
    }
}
