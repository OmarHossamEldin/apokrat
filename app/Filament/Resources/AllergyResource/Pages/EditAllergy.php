<?php

namespace App\Filament\Resources\AllergyResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\EditTranslatable;
use App\Filament\Resources\AllergyResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditAllergy extends EditRecord
{
    use EditTranslatable;
    
    protected static string $resource = AllergyResource::class;

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
