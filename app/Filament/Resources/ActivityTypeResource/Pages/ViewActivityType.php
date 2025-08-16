<?php

namespace App\Filament\Resources\ActivityTypeResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ViewTranslatable;
use App\Filament\Resources\ActivityTypeResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ViewActivityType extends ViewRecord
{
    use ViewTranslatable;
    
    protected static string $resource = ActivityTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
