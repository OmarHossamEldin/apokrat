<?php

namespace App\Filament\Resources\SpecializationResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ViewTranslatable;
use App\Filament\Resources\SpecializationResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ViewSpecialization extends ViewRecord
{
    use ViewTranslatable;
    
    protected static string $resource = SpecializationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
