<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserBankAccount;
use Illuminate\Database\Seeder;

class UserBankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserBankAccount::factory()->create(['user_id' => 3]);
    }
}