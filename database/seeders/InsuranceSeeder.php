<?php

namespace Database\Seeders;

use App\Models\Insurance;
use App\Models\InsuranceTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InsuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enInsuranceName = ['Tawuniya', 'MedGulf', 'ALETIHAD', 'Saudi Enaya', 'Walaa'];
        $arInsuranceName = ['التعاونية', 'ميدغلف', 'الأتحاد', 'عناية السعودية', 'ولاء'];
        $insuranceImg = ['tawuniya', 'medgulf', 'aletihad', 'saudi_enaya', 'walaa'];

        for($i=0 ; $i <= 4; $i++){
            Insurance::factory()
                ->has(InsuranceTranslation::factory()->state(['locale'=> 'en','name' => $enInsuranceName[$i]]),'insurance_translation')
                ->has(InsuranceTranslation::factory()->state(['locale'=> 'ar','name' => $arInsuranceName[$i]]),'insurance_translation')
            ->create(['image' => asset('images/insurance_logo/'.$insuranceImg[$i].'.jpg')]);
        }
    }
}
