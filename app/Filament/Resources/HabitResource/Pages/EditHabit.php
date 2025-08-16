<?php

namespace App\Filament\Resources\HabitResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\EditTranslatable;
use App\Filament\Resources\HabitResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditHabit extends EditRecord
{
    use EditTranslatable;
    
    protected static string $resource = HabitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
