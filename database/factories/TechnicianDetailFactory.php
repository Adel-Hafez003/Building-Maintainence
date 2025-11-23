<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TechnicianDetailFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id'             => User::factory()->technician(), // فني جديد إن لم يُمرَّر
            'service_id'          => Service::factory(),
            'years_of_experience' => $this->faker->numberBetween(0, 15),
            'skills_description'  => $this->faker->optional()->sentence(10),
        ];
    }
}
