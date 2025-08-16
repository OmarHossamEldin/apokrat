<?php

namespace App\Filament\Resources\FaqResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ViewTranslatable;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\FaqResource;
use Filament\Actions;

class ViewFaq extends ViewRecord
{
    use ViewTranslatable;

    protected static string $resource = FaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
