<?php

namespace App\Filament\Resources\SurgeryResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ListTranslatable;
use App\Filament\Resources\SurgeryResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListSurgeries extends ListRecords
{
    use ListTranslatable;
    
    protected static string $resource = SurgeryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
