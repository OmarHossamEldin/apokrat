<?php

namespace App\Filament\Resources\SpecializationResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\EditTranslatable;
use App\Filament\Resources\SpecializationResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditSpecialization extends EditRecord
{
    use EditTranslatable;
    
    protected static string $resource = SpecializationResource::class;

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
