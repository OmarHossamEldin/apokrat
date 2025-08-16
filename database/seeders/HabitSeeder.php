<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\HabitTranslation;
use Illuminate\Database\Seeder;
use App\Models\Habit;
use App\Models\HabitChoice;
use App\Models\HabitChoiceTranslation;

class HabitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enHabiteName = ['Smoking Habit', 'Alcohol Habit', 'Activity Level', 'Food Preference'];
        $arHabiteName = ['التدخين', 'تناول المشروبات الكحولية', 'مستوى النشاط', 'الأطعمة المفضلة'];
        
        $enHabiteChoiseName = [
            ['I used to, But i have quit', 'Don\'t Smoke', '1-2/Day', '2-3/Day', 'Less than 10/Day'],
            ['Heavy', 'Don\'t Drink', 'Social', 'Rare', 'Reguler'],
            ['Athletic', 'Active', 'Moderately Active', 'Sedentary'],
            ['Vegetarian', 'Non-vegetarian']
        ];

        $arHabiteChoiseName = [
            ['كنت أدخن ولكن أقلعت', 'لا أدخن', 'مرة أو مرتين في اليوم', 'مرتين أو ثلاث مرات في اليوم', 'أقل من 10 مرات في اليوم'],
            ['كثيرآ', 'لا أتناول المشروبات الكحولية', 'أجتماعي', 'نادرآ', 'بشكل منتظم'],
            ['رياضي', 'نشيط', 'نشيط نسبيآ', 'قليل الحركة'],
            ['نباتي', 'غير نباتي']
        ];

        for($i=0 ; $i < count($enHabiteName) ; $i++){
            $habit = Habit::factory()
                ->has(HabitTranslation::factory()->state(['locale'=> 'en','name' => $enHabiteName[$i]]),'habit_translation')
                ->has(HabitTranslation::factory()->state(['locale'=> 'ar','name' => $arHabiteName[$i]]),'habit_translation')
            ->create();
            
            for($x = 0; $x < count($enHabiteChoiseName[$i]) ; $x++){
                HabitChoice::factory()
                    ->has(HabitChoiceTranslation::factory()->state(['locale'=> 'en','name' => $enHabiteChoiseName[$i][$x]]),'habit_choice_translation')
                    ->has(HabitChoiceTranslation::factory()->state(['locale'=> 'ar','name' => $arHabiteChoiseName[$i][$x]]),'habit_choice_translation')
                ->create(['habit_id' => $habit->id]);
            }
        }
    }
}
