<?php

namespace App\Filament\Resources\InsuranceResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ListTranslatable;
use App\Filament\Resources\InsuranceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInsurances extends ListRecords
{
    use ListTranslatable;
    
    protected static string $resource = InsuranceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
