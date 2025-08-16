<?php

namespace App\Filament\Resources\UserBankAccountResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ViewTranslatable;
use App\Filament\Resources\UserBankAccountResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;

class ViewUserBankAccount extends ViewRecord
{
    use ViewTranslatable;
    protected static string $resource = UserBankAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
