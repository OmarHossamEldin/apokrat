<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Hsp;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HspTranslation>
 */
class HspTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'locale'  => $this->faker->randomElement(['en', 'ar']),
            'name'    => $this->faker->name, 
            'tagline' => $this->faker->sentence,
            'about'   => $this->faker->paragraph,
            'hsp_id'  => $this->faker->numberBetween(1, Hsp::count())
        ];
    }
}
