<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Bank;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserBankAccount>
 */
class UserBankAccountFactory extends Factory
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
            'user_id'        => $this->faker->numberBetween(1, User::count())
        ];
    }
}
