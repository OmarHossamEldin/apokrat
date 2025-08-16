<?php

namespace Database\Seeders;

use App\Models\Surgery;
use App\Models\SurgeryTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurgerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enSurgeryeName = ['Liver', 'Kidney', 'Heart', 'Lungs', 'Brain'];
        $arSurgeryeName = ['الكبد', 'الكلية', 'القلب', 'الرئتين', 'المخ'];

        for($i=0 ; $i <= 4; $i++){
            Surgery::factory()
                ->has(SurgeryTranslation::factory()->state(['locale'=> 'en','name' => $enSurgeryeName[$i]]),'surgery_translation')
                ->has(SurgeryTranslation::factory()->state(['locale'=> 'ar','name' => $arSurgeryeName[$i]]),'surgery_translation')
            ->create();
        }
    }
}
