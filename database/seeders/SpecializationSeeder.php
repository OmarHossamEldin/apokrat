<?php

namespace Database\Seeders;

use App\Models\Specialization;
use App\Models\SpecializationTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enSpecializationName = ['General Medicine', 'Family Medicine', 'Psychiatry & Psychology Clinic', 'Pediatrics', 'Ophthalmology'];
        $arSpecializationName = ['طب عام','طب الأسرة', 'الطب النفسي والسلوكي', 'طب الأطفال', 'طب العيون'];

        for($i=0 ; $i < count($enSpecializationName) ; $i++){
            Specialization::factory()
                ->has(SpecializationTranslation::factory()->state(['locale'=> 'en','name' => $enSpecializationName[$i]]),'specialization_translation')
                ->has(SpecializationTranslation::factory()->state(['locale'=> 'ar','name' => $arSpecializationName[$i]]),'specialization_translation')
            ->create();
        }
    }
}
