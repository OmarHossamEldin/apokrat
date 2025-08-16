<?php

namespace Database\Factories;

use App\Models\HealthGoal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HealthGoalTranslation>
 */
class HealthGoalTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'locale'         => $this->faker->randomElement(['en', 'ar']),
            'name'           => $this->faker->text(25),
            'health_goal_id' => $this->faker->numberBetween(1, HealthGoal::count())
        ];
    }
}
