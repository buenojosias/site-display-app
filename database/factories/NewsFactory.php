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
            'date' => fake()->dateTimeBetween($startDate = 'now', $endDate = '+ 2 days', $timezone = null),
            'source' => Arr::random(['Terra','Uol','R7','BBC']),
            'url' => fake()->url(),
        ];
    }
}
