<?php

namespace Database\Factories;

use App\Models\ChronicDisease;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChronicDiseaseTranslation>
 */
class ChronicDiseaseTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'locale'             => $this->faker->randomElement(['en', 'ar']),
            'name'               => $this->faker->text(25),
            'chronic_disease_id' => $this->faker->numberBetween(1, ChronicDisease::count())
        ];
    }
}
