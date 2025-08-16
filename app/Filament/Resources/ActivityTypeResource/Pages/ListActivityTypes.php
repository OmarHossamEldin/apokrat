<?php

namespace App\Filament\Resources\ActivityTypeResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ListTranslatable;
use App\Filament\Resources\ActivityTypeResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListActivityTypes extends ListRecords
{
    use ListTranslatable;
    
    protected static string $resource = ActivityTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
