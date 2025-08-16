<?php

namespace App\Filament\Resources\HspResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ListTranslatable;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\HspResource;
use Filament\Actions;

class ListHsps extends ListRecords
{
    use ListTranslatable;
    
    protected static string $resource = HspResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
