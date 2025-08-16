<?php

namespace App\Filament\Resources\InjuryResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ListTranslatable;
use App\Filament\Resources\InjuryResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListInjuries extends ListRecords
{
    use ListTranslatable;
    
    protected static string $resource = InjuryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
