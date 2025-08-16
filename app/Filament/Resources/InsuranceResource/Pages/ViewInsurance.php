<?php

namespace App\Filament\Resources\InsuranceResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ViewTranslatable;
use App\Filament\Resources\InsuranceResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewInsurance extends ViewRecord
{
    use ViewTranslatable;
    
    protected static string $resource = InsuranceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
