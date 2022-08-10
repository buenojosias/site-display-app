<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DriverAddress>
 */
class DriverAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'street_name' => fake()->streetName(),
            'number' => fake()->buildingNumber(),
            'zipcode' => rand(80000000,83999999),
            'district' => fake()->cityPrefix(),
            'city' => fake()->city(),
            'state' => fake()->stateAbbr(),
        ];
    }
}
