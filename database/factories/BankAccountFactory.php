<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankAccount>
 */
class BankAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_name'     => $this->faker->name(),
            'account_number' => $this->faker->bankAccountNumber(),
            'bank_id'        => $this->faker->numberBetween(1, Bank::count()),
            'admin_id'       => $this->faker->numberBetween(1, Admin::count())
        ];
    }
}
