<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\EditTranslatable;
use App\Filament\Resources\ServiceResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditService extends EditRecord
{
    use EditTranslatable;
    
    protected static string $resource = ServiceResource::class;

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
