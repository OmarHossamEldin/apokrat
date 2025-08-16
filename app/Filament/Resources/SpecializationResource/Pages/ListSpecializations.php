<?php

namespace App\Filament\Resources\SpecializationResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ListTranslatable;
use App\Filament\Resources\SpecializationResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListSpecializations extends ListRecords
{
    use ListTranslatable;
    
    protected static string $resource = SpecializationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
