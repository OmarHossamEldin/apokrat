<?php

namespace App\Filament\Resources\ChronicDiseaseResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\EditTranslatable;
use App\Filament\Resources\ChronicDiseaseResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditChronicDisease extends EditRecord
{
    use EditTranslatable;
    
    protected static string $resource = ChronicDiseaseResource::class;

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
