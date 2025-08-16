<?php

namespace App\Filament\Resources\HspResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ViewTranslatable;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\HspResource;
use Filament\Actions;

class ViewHsp extends ViewRecord
{
    use ViewTranslatable;
    
    protected static string $resource = HspResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
