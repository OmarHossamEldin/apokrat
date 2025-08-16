<?php

namespace App\Filament\Resources\InjuryResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ViewTranslatable;
use App\Filament\Resources\InjuryResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ViewInjury extends ViewRecord
{
    use ViewTranslatable;
    
    protected static string $resource = InjuryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
