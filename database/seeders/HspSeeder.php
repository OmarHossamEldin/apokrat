<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HspTranslation;
use App\Models\Hsp;

class HspSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $hsp = Hsp::factory()
                ->has(HspTranslation::factory()->state(['locale'  => 'en',
                    'name'    => 'Apokrat HSP',
                    'tagline' => 'Healthcare Center',
                    'about'   => 'A center specialized in general medicine and general surgery']),'hsp_translation')
                ->has(HspTranslation::factory()->state(['locale'  => 'ar',
                    'name'    => 'أبوقراط للخدمات الصحية',
                    'tagline' => 'مركز للعناية الصحية',
                    'about'   => 'مركز متخصص بالطب العام والجراحة العامة']),'hsp_translation')
            ->create(['user_id' => 2, 'website' => 'https://www.apokrat.com', 'logo' => asset('images/logo.png')]);
            
            $hsp->hsp_gallary()->saveMany(\App\Models\HspGallary::factory(3)->make());
            $hsp->hsp_phone_numbers()->saveMany(\App\Models\HspPhoneNumber::factory(3)->make());
            $hsp->activity_types()->attach([1, 4, 5]);
            $hsp->specielist_info()->save(\App\Models\SpecialistInfo::factory()->make());
            $hsp->work_schedules()->saveMany(\App\Models\WorkSchedule::factory(3)->make(['work_date' => 'sunday']));
    }
}
