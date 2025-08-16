<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ViewTranslatable;
use App\Filament\Resources\ServiceResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ViewService extends ViewRecord
{
    use ViewTranslatable;
    
    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
