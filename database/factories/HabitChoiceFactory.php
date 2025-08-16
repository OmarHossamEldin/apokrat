<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Habit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HabitChoice>
 */
class HabitChoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'habit_id' => $this->faker->numberBetween(1, Habit::count()),
            'admin_id' => $this->faker->numberBetween(1, Admin::count())
        ];
    }
}
