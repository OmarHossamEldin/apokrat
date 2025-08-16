<?php

namespace App\Filament\Resources\SurgeryResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ViewTranslatable;
use App\Filament\Resources\SurgeryResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ViewSurgery extends ViewRecord
{
    use ViewTranslatable;
    
    protected static string $resource = SurgeryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
