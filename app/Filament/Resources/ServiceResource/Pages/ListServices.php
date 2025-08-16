<?php

namespace App\Filament\Resources\ServiceResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ListTranslatable;
use App\Filament\Resources\ServiceResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListServices extends ListRecords
{
    use ListTranslatable;
    
    protected static string $resource = ServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
