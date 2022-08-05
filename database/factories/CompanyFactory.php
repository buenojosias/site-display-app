<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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

    public function withFaker()
    {
        return \Faker\Factory::create('pt_BR');
    }

    public function definition()
    {
        $company = $this->faker->company();
        return [
            'segment_id' => rand(1,8),
            'region' => 'CWB',
            'fantasy_name' => $company,
            'corporate_name' => $company .' '. $this->faker->companySuffix(),
            'cnpj' => rand(10000000000000,99999999999999)
        ];
    }
}
