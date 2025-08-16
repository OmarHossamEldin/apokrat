<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ServiceTranslation;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enServiceName = ['Virtual Consultation', 'Home Visit Doctor', 'Nurse Visit', 'Physiotherapist', 'Laboratory'];
        $arServiceName = ['أستشارة عن بعد', 'زيارة الطبيب', 'زيارة ممرض', 'العلاج الطبيعي', 'معامل التحاليل'];
        $serviceImg = ['virtual_consultation', 'doctor_visit', 'nurse_visit', 'physiotherapist', 'laboratory'];

        $enServiceChildName = ['General Medicine', 'Neurology', 'General Surgery', 'Nephrology', 'Orthopedics'];
        $arServiceChildName = ['الطب العام', 'المخ والأعصاب', 'الجراحة العامة', 'الكلى', 'العظام'];
        $serviceChildImg = ['general_medicine', 'neurology', 'general_surgery', 'nephrology', 'orthopedics'];

        for($i=0 ; $i < count($enServiceName) ; $i++){
            Service::factory()
                ->has(ServiceTranslation::factory()->state(['locale'=> 'en','name' => $enServiceName[$i]]),'service_translation')
                ->has(ServiceTranslation::factory()->state(['locale'=> 'ar','name' => $arServiceName[$i]]),'service_translation')
            ->create(['parent_id' => null, 'image' => asset('images/service_image/'.$serviceImg[$i].'.png')]);
        }

        for($i=0 ; $i < count($enServiceChildName) ; $i++){
            Service::factory()
                ->has(ServiceTranslation::factory()->state(['locale'=> 'en','name' => $enServiceChildName[$i]]),'service_translation')
                ->has(ServiceTranslation::factory()->state(['locale'=> 'ar','name' => $arServiceChildName[$i]]),'service_translation')
            ->create(['parent_id' => 1, 'image' => asset('images/service_image/'.$serviceChildImg[$i].'.png')]);
        }
    }
}
