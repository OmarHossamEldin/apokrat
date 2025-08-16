<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(InsuranceSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(BankAccountSeeder::class);
        $this->call(UserBankAccountSeeder::class);
        $this->call(ChronicDiseaseSeeder::class);
        $this->call(InjurySeeder::class);
        $this->call(AllergySeeder::class);
        $this->call(SurgerySeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(HabitSeeder::class);
        $this->call(HealthGoalSeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(ActivityTypeSeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(HspSeeder::class);
        $this->call(CouponSeeder::class);
    }
}
