<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $company = $this->faker->company();
        return [
            'segment_id' => rand(1,8),
            'region' => 'CWB',
            'fantasy_name' => $company,
            'corporate_name' => $company .' '. fake()->companySuffix(),
            'cnpj' => rand(10000000000000,99999999999999),
            'default_cost' => Arr::random([8,10,10,10,12]),
            'active' => Arr::random([1,1,1,0]),
        ];
    }
}
