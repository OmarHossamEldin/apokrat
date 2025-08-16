<?php

namespace App\Filament\Resources\HspResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\EditTranslatable;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\HspResource;
use Filament\Actions;

class EditHsp extends EditRecord
{
    use EditTranslatable;
    
    protected static string $resource = HspResource::class;

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
