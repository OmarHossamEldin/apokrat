<?php

namespace App\Filament\Resources\UserBankAccountResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\EditTranslatable;
use App\Filament\Resources\UserBankAccountResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions;

class EditUserBankAccount extends EditRecord
{
    use EditTranslatable;
    protected static string $resource = UserBankAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
