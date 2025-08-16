<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpecialistInfo>
 */
class SpecialistInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'years_of_experience' => rand(2, 10),
            'medical_license'     => $this->faker->randomNumber(8, true),
            'specialization_id'   => $this->faker->numberBetween(1, \App\Models\Specialization::count()),
            'hsp_id'              => $this->faker->numberBetween(1, \App\Models\Hsp::count()),
        ];
    }
}
