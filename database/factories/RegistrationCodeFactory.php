<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegistrationCode>
 */
class RegistrationCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => rand(00000,99999),
            'expires_at' => fake()->dateTimeBetween($startDate = 'now', $endDate = '+ 3 days', $timezone = null),
        ];
    }
}
