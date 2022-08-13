<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Display>
 */
class DisplayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => Str::uuid()->toString(),
            'driver_id' => rand(1,25),
            'datetime' => fake()->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            'latitude' => fake()->latitude($min = -25.567, $max = -25.343),
            'longitude' => fake()->longitude($min = -49.360, $max = -49.151),
            //'cost' => 10,
        ];
    }
}
