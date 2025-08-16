<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hsp>
 */
class HspFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'website' => $this->faker->url,
            'logo'    => $this->faker->imageUrl,
            'lat'     => $this->faker->latitude,
            'long'    => $this->faker->longitude,
            'user_id' => $this->faker->numberBetween(1, \App\Models\User::count()),
        ];
    }
}
