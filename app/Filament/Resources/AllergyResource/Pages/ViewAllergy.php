<?php

namespace App\Filament\Resources\AllergyResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ViewTranslatable;
use App\Filament\Resources\AllergyResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ViewAllergy extends ViewRecord
{
    use ViewTranslatable;
    
    protected static string $resource = AllergyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
