<?php

namespace Database\Seeders;

use App\Models\ChronicDisease;
use App\Models\ChronicDiseaseTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChronicDiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enChronicDiseaseName = ['Hypertention', 'Heart Disease', 'Diabetes Mellitus', 'COPD', 'Rheumatoid Arthritis'];
        $arChronicDiseaseName = ['أرتفاع ضغط الدم', 'مرض القلب', 'داء السكري', 'الربو', 'ألتهاب المفاصل الروماتويدي '];

        for($i=0 ; $i <= 4; $i++){
            ChronicDisease::factory()
                ->has(ChronicDiseaseTranslation::factory()->state(['locale'=> 'en','name' => $enChronicDiseaseName[$i]]),'chronic_disease_translation')
                ->has(ChronicDiseaseTranslation::factory()->state(['locale'=> 'ar','name' => $arChronicDiseaseName[$i]]),'chronic_disease_translation')
            ->create();
        }
    }
}
