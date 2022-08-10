<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'brand' => Arr::random(['Fiat','Honda','Chevrolet','Volkswagen']),
            'model' => Arr::random(['Strada','City','Cruize','Gol']),
            'color' => Arr::random(['Branco','Preto','Cinza','Vermelho']),
            'year' => rand(2015,2022),
            'license_plate' => Str::random(7),
        ];
    }
}
