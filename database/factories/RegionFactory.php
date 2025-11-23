<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Region>
 */
class RegionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'      => $this->faker->unique()->city(),
            'latitude'  => $this->faker->randomFloat(8, 33.40, 33.60),
            'longitude' => $this->faker->randomFloat(8, 36.15, 36.40),
        ];
    }
}
