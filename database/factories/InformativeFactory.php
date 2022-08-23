<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Informative>
 */
class InformativeFactory extends Factory
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
            'type' => Arr::random(['VIDEO','IMAGE']),
            'url' => Arr::random([null,fake()->url()]),
            'active' => Arr::random([0,1,1]),
            'expires_at' => fake()->dateTimeBetween($startDate = 'now', $endDate = '+ 3 days', $timezone = null)
        ];
    }
}
