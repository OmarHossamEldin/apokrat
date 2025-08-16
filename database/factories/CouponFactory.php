<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code'                  => Str::random(5),
            'discount_type'         => $this->faker->randomElement(['percentage', 'fixed']),
            'max_discount_amount'   => $this->faker->randomElement(['50', '100']),
            'coupon_count'          => rand(1, 50),
            'coupon_count_per_user' => rand(1, 5),
            'value'                 => rand(10, 50),
            'start_date'            => Carbon::now()->format('Y-m-d'),
            'end_date'              => Carbon::now()->addMonth()->format('Y-m-d'),
            'status'                => 1,
            'admin_id'              => $this->faker->numberBetween(1, \App\Models\Admin::count())
        ];
    }
}
