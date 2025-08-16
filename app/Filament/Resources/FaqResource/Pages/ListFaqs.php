<?php

namespace App\Filament\Resources\FaqResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ListTranslatable;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\FaqResource;
use Filament\Actions;

class ListFaqs extends ListRecords
{
    use ListTranslatable;

    protected static string $resource = FaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
