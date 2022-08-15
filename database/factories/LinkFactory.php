<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'slug' => Str::random(6),
            'phone' => Arr::random([null,rand(4130000000,4136999999)]),
            'whatsapp' => Arr::random([null,rand(41987000000,41999999999)]),
            'facebook' => Arr::random([null,fake()->userName()]),
            'instagram' => Arr::random([null,fake()->userName()]),
            'site' => Arr::random([null,fake()->url()]),
        ];
    }
}
