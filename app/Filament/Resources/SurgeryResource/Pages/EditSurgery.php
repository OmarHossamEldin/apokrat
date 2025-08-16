<?php

namespace App\Filament\Resources\SurgeryResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\EditTranslatable;
use App\Filament\Resources\SurgeryResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditSurgery extends EditRecord
{
    use EditTranslatable;
    
    protected static string $resource = SurgeryResource::class;

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
