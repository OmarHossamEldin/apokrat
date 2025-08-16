<?php

namespace App\Filament\Resources\UserBankAccountResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\ListTranslatable;
use App\Filament\Resources\UserBankAccountResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions;

class ListUserBankAccounts extends ListRecords
{
    use ListTranslatable;
    protected static string $resource = UserBankAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
