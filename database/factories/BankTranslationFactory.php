<?php

namespace Database\Factories;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankTranslation>
 */
class BankTranslationFactory extends Factory
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
            'name'    => $this->faker->text(25),
            'bank_id' => $this->faker->numberBetween(1, Bank::count())
        ];
    }
}
