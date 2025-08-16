<?php

namespace Database\Seeders;

use App\Models\HealthGoal;
use App\Models\HealthGoalTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HealthGoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enHealthGoalName = ['Stop Smoking', 'Manage a chronic disease', 'Wellness and prevention', 'Be Athlete'];
        $arHealthGoalName = ['توقف عن التدخين', 'إدارة مرض مزمن', 'العافية والوقاية', 'كن رياضيآ'];

        for($i=0 ; $i < count($enHealthGoalName); $i++){
            HealthGoal::factory()
                ->has(HealthGoalTranslation::factory()->state(['locale'=> 'en','name' => $enHealthGoalName[$i]]),'health_goal_translation')
                ->has(HealthGoalTranslation::factory()->state(['locale'=> 'ar','name' => $arHealthGoalName[$i]]),'health_goal_translation')
            ->create();
        }
    }
}
