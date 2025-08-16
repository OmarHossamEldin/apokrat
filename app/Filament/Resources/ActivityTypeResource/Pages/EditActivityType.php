<?php

namespace App\Filament\Resources\ActivityTypeResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\EditTranslatable;
use App\Filament\Resources\ActivityTypeResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditActivityType extends EditRecord
{
    use EditTranslatable;
    
    protected static string $resource = ActivityTypeResource::class;

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
