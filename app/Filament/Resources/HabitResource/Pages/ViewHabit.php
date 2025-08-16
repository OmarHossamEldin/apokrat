<?php

namespace App\Filament\Resources\HabitResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ViewTranslatable;
use App\Filament\Resources\HabitResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ViewHabit extends ViewRecord
{
    use ViewTranslatable;
    
    protected static string $resource = HabitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
