<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ActivityTypeTranslation;
use Illuminate\Database\Seeder;
use App\Models\ActivityType;

class ActivityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enActivityTypeName = ['Hospital', 'Medical Center', 'Clinic', 'Medical Laboratory', 'Radiology Lab', 'Pharmacy'];
        $arActivityTypeName = ['المستشفى','المركز الطبي', 'العيادة', 'معمل التحاليل', 'معمل الأشعة', 'الصيدلية'];

        for($i=0 ; $i < count($enActivityTypeName); $i++){
            ActivityType::factory()
                ->has(ActivityTypeTranslation::factory()->state(['locale'=> 'en','name' => $enActivityTypeName[$i]]),'activity_type_translation')
                ->has(ActivityTypeTranslation::factory()->state(['locale'=> 'ar','name' => $arActivityTypeName[$i]]),'activity_type_translation')
            ->create();
        }
    }
}
