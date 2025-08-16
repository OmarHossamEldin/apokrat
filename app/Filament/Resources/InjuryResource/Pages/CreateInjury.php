<?php

namespace App\Filament\Resources\InjuryResource\Pages;

use CactusGalaxy\FilamentAstrotomic\Resources\Pages\Record\CreateTranslatable;
use App\Filament\Resources\InjuryResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateInjury extends CreateRecord
{
    use CreateTranslatable;

    protected static string $resource = InjuryResource::class;
}
