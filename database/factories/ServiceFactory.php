<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image'     => $this->faker->imageUrl(),
            'min_price' => rand(10, 100),
            'parent_id' => $this->faker->numberBetween(1, Service::count()),
            'admin_id'  => $this->faker->numberBetween(1, Admin::count())
        ];
    }
}
