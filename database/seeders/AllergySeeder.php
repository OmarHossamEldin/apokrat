<?php

namespace Database\Seeders;

use App\Models\Allergy;
use App\Models\AllergyTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enAllergyName = ['Insulin', 'Lactose', 'Fish', 'Nuts', 'Pets'];
        $arAllergyName = ['الأنسولين','اللاكتوز', 'السمك', 'المكسرات', 'الحيوانات'];

        for($i=0 ; $i <= 4; $i++){
            Allergy::factory()
                ->has(AllergyTranslation::factory()->state(['locale'=> 'en','name' => $enAllergyName[$i]]),'allergy_translation')
                ->has(AllergyTranslation::factory()->state(['locale'=> 'ar','name' => $arAllergyName[$i]]),'allergy_translation')
            ->create();
        }
    }
}
