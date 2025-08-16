<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_admin = User::factory()->create([
            'email'    => 'admin@apokrat.com',
            'password' => bcrypt('12345678'),
            'gender'   => 'male',
        ])->wallet()->create();
       
        $user_hsp = User::factory()->create([
            'email'    => 'hsp@apokrat.com',
            'password' => bcrypt('12345678'),
            'gender'   => 'male',
        ])->wallet()->create();
        
        $user_patient = User::factory()->create([
            'email'    => 'patient@apokrat.com',
            'password' => bcrypt('12345678'),
            'gender'   => 'male',
        ])->wallet()->create();
    }
}
