<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ActivityType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActivityTypeTranslation>
 */
class ActivityTypeTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'locale'           => $this->faker->randomElement(['en', 'ar']),
            'name'             => $this->faker->text(25),
            'activity_type_id' => $this->faker->numberBetween(1, ActivityType::count())
        ];
    }
}
