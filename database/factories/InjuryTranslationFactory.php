<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Injury;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InjuryTranslation>
 */
class InjuryTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'locale'    => $this->faker->randomElement(['en', 'ar']),
            'name'      => $this->faker->text(25),
            'injury_id' => $this->faker->numberBetween(1, Injury::count())
        ];
    }
}
