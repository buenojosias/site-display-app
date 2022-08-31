<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
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
            'category_id' => rand(1,4),
            'date' => fake()->dateTimeBetween($startDate = '- 1 days', $endDate = '+ 1 days', $timezone = null),
            'source' => Arr::random(['Terra','Uol','R7','BBC']),
            'url' => fake()->url(),
        ];
    }
}
