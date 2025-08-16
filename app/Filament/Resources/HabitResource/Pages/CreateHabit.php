<?php

namespace App\Filament\Resources\HabitResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\CreateTranslatable;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\HabitResource;
use Filament\Actions;

class CreateHabit extends CreateRecord
{
    use CreateTranslatable;
    
    protected static string $resource = HabitResource::class;
}
