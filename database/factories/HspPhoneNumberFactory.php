<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HspPhoneNumber>
 */
class HspPhoneNumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number'  => $this->faker->phoneNumber,
            'hsp_id'  => $this->faker->numberBetween(1, \App\Models\Hsp::count()),
        ];
    }
}
