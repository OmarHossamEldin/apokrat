<?php

namespace App\Filament\Resources\UserBankAccountResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\CreateTranslatable;
use App\Filament\Resources\UserBankAccountResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateUserBankAccount extends CreateRecord
{
    use CreateTranslatable;
    protected static string $resource = UserBankAccountResource::class;
}
