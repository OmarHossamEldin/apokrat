<?php

namespace App\Filament\Resources\HabitResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ListTranslatable;
use App\Filament\Resources\HabitResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListHabits extends ListRecords
{
    use ListTranslatable;
    
    protected static string $resource = HabitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
