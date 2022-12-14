<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advertising>
 */
class AdvertisingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->realText($maxNbChars = 40, $indexSize = 1),
            'active' => Arr::random([0,0,1]),
            'expires_at' => fake()->dateTimeBetween($startDate = 'now', $endDate = '+ 30 days', $timezone = null),
        ];
    }
}
