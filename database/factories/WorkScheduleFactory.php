<?php

namespace Database\Factories;

use App\Models\Hsp;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkSchedule>
 */
class WorkScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $timeFrom = $this->faker->dateTimeBetween('09:00', '16:30');
        $timeTo = (clone $timeFrom)->modify('+30 minutes');
        return [
            'work_date' => $this->faker->randomElement(['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday']),
            'time_from' => $timeFrom->format('H:i'),
            'time_to'   => $timeTo->format('H:i'),
            'hsp_id'    => $this->faker->numberBetween(1, Hsp::count()),
        ];
    }
}
