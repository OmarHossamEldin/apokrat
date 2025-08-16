<?php

namespace App\Filament\Resources\BankResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ViewTranslatable;
use App\Filament\Resources\BankResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBank extends ViewRecord
{
    use ViewTranslatable;
    
    protected static string $resource = BankResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
