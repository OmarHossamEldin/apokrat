<?php

namespace App\Filament\Resources\AllergyResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ListTranslatable;
use App\Filament\Resources\AllergyResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListAllergies extends ListRecords
{
    use ListTranslatable;
    
    protected static string $resource = AllergyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
