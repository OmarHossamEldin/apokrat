<?php

namespace Database\Factories;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FaqTranslation>
*/
class FaqTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'locale'      => $this->faker->randomElement(['en', 'ar']),
            'title'       => $this->faker->text(25),
            'description' => $this->faker->paragraph,
            'faq_id'      => $this->faker->numberBetween(1, Faq::count())  
        ];
    }
}
