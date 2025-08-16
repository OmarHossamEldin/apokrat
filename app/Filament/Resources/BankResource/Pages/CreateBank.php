<?php

namespace App\Filament\Resources\BankResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\CreateTranslatable;
use App\Filament\Resources\BankResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBank extends CreateRecord
{
    use CreateTranslatable;
    
    protected static string $resource = BankResource::class;
}
