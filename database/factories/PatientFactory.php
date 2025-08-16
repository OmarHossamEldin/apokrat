<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'       => $this->faker->firstName(),
            'last_name'        => $this->faker->lastName(),
            'blood_type'       => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'height'           => rand(160, 190),
            'weight'           => rand(80, 90),
            'residence_type'   => $this->faker->randomElement(['resident/citizen','visitor', 'pilgrim', 'hajj']),
            'insurance_number' => $this->faker->randomNumber(8, true),
            'insurance_id'     => $this->faker->numberBetween(1, \App\Models\Insurance::count()),
            'user_id'          => $this->faker->numberBetween(1, \App\Models\User::count()),
        ];
    }
}
