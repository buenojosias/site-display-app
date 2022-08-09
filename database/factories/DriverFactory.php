<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'cpf' => rand(11111111111,99999999999),
            'region' => 'CWB',
            'active' => Arr::random([1,1,1,0]),
            'working' => Arr::random([0,1]),
        ];
    }
}
