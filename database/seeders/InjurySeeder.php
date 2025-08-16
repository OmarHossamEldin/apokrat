<?php

namespace Database\Seeders;

use App\Models\Injury;
use App\Models\InjuryTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InjurySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enInjuryeName = ['Ankle Sprain', 'Sport Injury', 'Swelling', 'Knee Injury', 'Shin Splints'];
        $arInjuryeName = ['إلتواء الكاحل', 'إصابة رياضية', 'تورم', 'إصابة الركبة', 'جبائر حرف الظنبوب'];

        for($i=0 ; $i <= 4; $i++){
            Injury::factory()
                ->has(InjuryTranslation::factory()->state(['locale'=> 'en','name' => $enInjuryeName[$i]]),'injury_translation')
                ->has(InjuryTranslation::factory()->state(['locale'=> 'ar','name' => $arInjuryeName[$i]]),'injury_translation')
            ->create();
        }
    }
}
