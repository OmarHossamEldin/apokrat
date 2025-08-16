<?php

namespace App\Filament\Resources\InjuryResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\EditTranslatable;
use App\Filament\Resources\InjuryResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditInjury extends EditRecord
{
    use EditTranslatable;
    
    protected static string $resource = InjuryResource::class;

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
