<?php

namespace Database\Factories;

use App\Models\Request;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'request_id' => Request::factory(),
            'type'       => $this->faker->randomElement(['before','after']),
            'url'        => $this->faker->imageUrl(640, 480, 'business', true),
        ];
    }
}
