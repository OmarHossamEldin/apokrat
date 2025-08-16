<?php

namespace App\Filament\Resources\ChronicDiseaseResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ViewTranslatable;
use App\Filament\Resources\ChronicDiseaseResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ViewChronicDisease extends ViewRecord
{
    use ViewTranslatable;
    
    protected static string $resource = ChronicDiseaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
