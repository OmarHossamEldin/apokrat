<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\User;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patient = Patient::factory()->create([
            'first_name' => 'Apokrat', 
            'last_name'  => 'Patient', 
            'user_id'    => 3
        ]);

        $patient->chronic_diseases()->attach([1, 3, 5]);
        $patient->injuries()->attach([1, 3, 5]);
        $patient->surgeries()->attach([1, 3, 5]);
        $patient->allergies()->attach([1, 3, 5]);
        $patient->habits()->attach([['habit_id'=> 1,'habit_choice_id'=> 2], ['habit_id'=> 2,'habit_choice_id'=> 7]]);
        $patient->health_goals()->attach([3, 4]);
    }
}
