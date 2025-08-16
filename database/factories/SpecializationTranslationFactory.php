<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpecializationTranslation>
 */
class SpecializationTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'locale'            => $this->faker->randomElement(['en', 'ar']),
            'name'              => $this->faker->text(25),
            'specialization_id' => $this->faker->numberBetween(1, \App\Models\Specialization::count())
        ];
    }
}
