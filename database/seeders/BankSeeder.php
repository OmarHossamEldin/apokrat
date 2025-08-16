<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\BankTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enBankName = ['Saudi Awwal Bank', 'Saudi National Bank', 'The Saudi Investment Bank', 'Riyad Bank', 'Banque Saudi fransi'];
        $arBankName = ['البنك السعودي الأول', 'البنك الأهلي السعودي', 'البنك السعودي للاستثمار', 'بنك الرياض', 'البنك السعودي الفرنسي'];
        $bankImg = ['SABB', 'NCB', 'SAIB', 'RB', 'BSF'];

        for($i=0 ; $i <= 4; $i++){
            Bank::factory()
                ->has(BankTranslation::factory()->state(['locale'=> 'en','name' => $enBankName[$i]]),'bank_translation')
                ->has(BankTranslation::factory()->state(['locale'=> 'ar','name' => $arBankName[$i]]),'bank_translation')
            ->create(['image' => asset('images/bank_logo/'.$bankImg[$i].'.jpg')]);
        }
    }
}
